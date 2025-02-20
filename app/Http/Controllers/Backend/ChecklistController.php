<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booth;
use App\Models\TeamMember;
use App\Models\ChecklistTask;
use App\Models\Event;
use BadFunctionCallException;
use Illuminate\Http\Request;
use Spatie\Backtrace\Arguments\ReducedArgument\ReducedArgumentContract;

class ChecklistController extends Controller
{

    public function checklist_main()
    {

        $checklists = Event::with('checklistTasks')
            ->get()
            ->map(function ($event) {
                $total_tasks = $event->checklistTasks->count();
                $total_team_members = $event->checklistTasks->pluck('member_id')->unique()->count();

                return [
                    'event_id' => $event->id,
                    'event_name' => $event->event_name,
                    'total_tasks' => $total_tasks,
                    'total_team_members' => $total_team_members,
                    'status' => $total_tasks > 0 && $event->checklistTasks->where('due_date', '<', now())->count() > 0 ? 'Pending' : 'On Track'
                ];
            });
        return view('backend.checklist.checklist', compact('checklists'));
    }
    public function index($eventId)
    {
        $this->updateExpenseStatus();
        $view = ChecklistTask::where('event_id', $eventId)->with('teamMember')->get();
        return view('backend.checklist.index', compact('view'));
    }

    public function create()
    {
        $members = TeamMember::all();
        $events = Event::all();
        $booths = Booth::all();
        return view('backend.checklist.create', compact('members', 'events', 'booths'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'booth_id' => 'required|exists:booths,id',
            'member_id' => 'required|exists:team_members,id',
            'task' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'due_date' => 'required|date',
            'priority' => 'required',
            'task_description' => 'required|string|max:255',
            'upload_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = new ChecklistTask();
        $data->task = $validatedData['task'];
        $data->category = $validatedData['category'];
        $data->due_date = $validatedData['due_date'];
        $data->event_id = $validatedData['event_id'];
        $data->booth_id = $validatedData['booth_id'];
        $data->member_id = $validatedData['member_id'];
        $data->priority = $validatedData['priority'];
        $data->task_description = $validatedData['task_description'];

        if ($request->hasFile('upload_img')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('upload_img')->getClientOriginalExtension();
            $upload_img = now()->timestamp . $randomize . '.' . $extension;
            $request->file('upload_img')->move('upload_image/checklist/', $upload_img);
            $data->upload_img =  $upload_img;
        }
        $data->save();
        return redirect()->route('checklist_task', $request->event_id)->with('succes', 'Checklist Store Successfully!!');
    }

    public function edit($id, $eventId)
    {
        $members = TeamMember::all();
        $events = Event::all();
        $edit = ChecklistTask::find($id);
        return view('backend.checklist.edit', compact('edit', 'events', 'members', 'eventId'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'member_id' => 'required|exists:team_members,id',
            'task' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'due_date' => 'required|date',
            'priority' => 'required',
            'task_description' => 'required|string|max:255',
            'upload_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = ChecklistTask::findOrFail($id);

        $data->task = $validatedData['task'];
        $data->category = $validatedData['category'];
        $data->due_date = $validatedData['due_date'];
        $data->event_id = $validatedData['event_id'];
        $data->member_id = $validatedData['member_id'];
        $data->priority = $validatedData['priority'];
        $data->task_description = $validatedData['task_description'];

        if ($request->hasFile('upload_img')) {
            if ($data->upload_img && file_exists(public_path('upload_image/checklist/' . $data->upload_img))) {
                unlink(public_path('upload_image/checklist/' . $data->upload_img));
            }

            // Upload new image
            $randomize = rand(111111, 999999);
            $extension = $request->file('upload_img')->getClientOriginalExtension();
            $upload_img = now()->timestamp . $randomize . '.' . $extension;
            $request->file('upload_img')->move(public_path('upload_image/checklist/'), $upload_img);
            $data->upload_img = $upload_img;
        }

        $data->save();
        return redirect()->route('checklist_task', $request->event_id)->with('success', 'Checklist Task Updated Successfully');
    }
    public function destroy($id)
    {
        $checklistTask = ChecklistTask::find($id);
        if (!$checklistTask) { 
            return redirect()->back()->with('error', 'Event not found.');
        }
        try {
            $checklistTask->delete();
            return redirect()->route('event.index')->with('success', 'ChecklistTask deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the checklist task.');
        }
    }

    public function updateExpenseStatus()
    {
        
        $expenses = ChecklistTask::where('status', '!=', 'paid')->get();
        foreach ($expenses as $expense) {
            if (date('Y-m-d',strtotime($expense->due_date)) < date('Y-m-d') && $expense->status !== 'overdue') {
                $expense->status = 'overdue';
                $expense->save();
            }
        }
    }

    public function updateChecklistStatus(Request $request)
    {
        $payment = ChecklistTask::find($request->id);

        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Payment not found']);
        }

        $newStatus = $request->status;

        // "Paid" ke baad koi status change nahi ho sakta
        if ($payment->status === 'paid') {
            return response()->json(['success' => false, 'message' => 'Paid expenses cannot be changed']);
        }

        // Overdue logic
        if ($newStatus === 'overdue' && $payment->due_date >= now()) {
            return response()->json(['success' => false, 'message' => 'Cannot mark as overdue before due date']);
        }

        // Paid status set hone ke baad koi aur update nahi ho sakta
        if ($newStatus === 'paid') {
            $payment->status = 'paid';
        } elseif ($newStatus === 'pending' && $payment->status === 'overdue') {
            // Agar overdue se pending me badla ja raha hai, toh due_date ko check karein
            if ($payment->due_date >= now()) {
                $payment->status = 'pending';
            } else {
                return response()->json(['success' => false, 'message' => 'Cannot move overdue to pending without updating due date']);
            }
        } else {
            $payment->status = $newStatus;
        }
        $payment->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }
}
