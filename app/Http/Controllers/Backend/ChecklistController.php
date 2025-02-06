<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\ChecklistTask;
use App\Models\Event;
use BadFunctionCallException;
use Illuminate\Http\Request;
use Spatie\Backtrace\Arguments\ReducedArgument\ReducedArgumentContract;

class ChecklistController extends Controller
{

    public function checklist_main(){
        
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
        return view('backend.checklist.checklist',compact('checklists'));
    }
    public function index($eventId)
    {
        // return view('backend.checklist.index');
        $view = ChecklistTask::where('event_id',$eventId)->with('teamMember')->get();
        return view('backend.checklist.index', compact('view'));
    }

    public function create()
    {
        $members = TeamMember::all();
        $events = Event::all();
        return view('backend.checklist.create', compact('members', 'events'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
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
        return redirect()->route('checklist_task',$request->event_id)->with('succes','Checklist Store Successfully!!');
    }

    public function edit($id,$eventId)
    {   
        $members = TeamMember::all();
        $events = Event::all();
        $edit = ChecklistTask::find($id);
        return view('backend.checklist.edit', compact('edit', 'events', 'members','eventId'));
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
        return redirect()->route('checklist_task',$request->event_id)->with('success', 'Checklist Task Updated Successfully');
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
    
}
