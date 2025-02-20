<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Expenses;
use BadFunctionCallException;
use Carbon\Carbon;

class ExpensesController extends Controller
{

    public function expenseListMain()
    {
        $expenses = Event::with(['booths', 'expense'])
            ->get()
            ->map(function ($event) {
                $total_expense = $event->expense->sum('ammount');
                $total_booths = $event->booths->count();
                return [
                    'event_id' => $event->id,
                    'event_name' => $event->event_name,
                    'total_booths' => $total_booths,
                    'start_date' => $event->start_date,
                    'end_date' => $event->end_date,
                    'total_expense' => $total_expense,
                ];
            });


        $totalExpenses = Expenses::sum('ammount');

        $lastEvent = Event::latest()->first();
        $lastEventExpenses = $lastEvent ? $lastEvent->expense->sum('ammount') : 0;

        $lastWeekExpenses = Expenses::where('created_at', '>=', Carbon::now()->subWeek())->sum('ammount');

        $lastMonthExpenses = Expenses::where('created_at', '>=', Carbon::now()->subMonth())->sum('ammount');

        $lastYearExpenses = Expenses::where('created_at', '>=', Carbon::now()->subYear())->sum('ammount');
        return view('backend.expenses.expenses_list', compact('expenses', 'totalExpenses', 'lastEventExpenses', 'lastWeekExpenses', 'lastMonthExpenses', 'lastYearExpenses'));
    }

    // old expenseListMain function code start
    // public function expenseListMain()
    // {
    //     $expenses = Event::with(['booths', 'expense'])
    //         ->get()
    //         ->map(function ($event) {
    //             $total_expense = $event->expense->sum('ammount');
    //             $total_booths = $event->booths->count();
    //             $paid_expenses = $event->expense->where('due_date', '>=', now())->count();
    //             $overdue_expenses = $event->expense->where('due_date', '<', now())->count();

    //             if ($overdue_expenses > 0) {
    //                 $status = 'Overdue';
    //             } elseif ($paid_expenses == $event->expense->count()) {
    //                 $status = 'All Paid';
    //             } else {
    //                 $status = 'On Hold';
    //             }

    //             return [
    //                 'event_id' => $event->id,
    //                 'event_name' => $event->event_name,
    //                 'total_booths' => $total_booths,
    //                 'start_date' => $event->start_date,
    //                 'end_date' => $event->end_date,
    //                 'total_expense' => $total_expense,
    //                 'status' => $status
    //             ];
    //         });

    //     $totalExpenses = Expenses::sum('ammount');
    //     $lastEvent = Event::latest()->first();
    //     $lastEventExpenses = $lastEvent ? $lastEvent->expense->sum('ammount') : 0;
    //     $lastWeekExpenses = Expenses::where('created_at', '>=', Carbon::now()->subWeek())->sum('ammount');
    //     $lastMonthExpenses = Expenses::where('created_at', '>=', Carbon::now()->subMonth())->sum('ammount');
    //     $lastYearExpenses = Expenses::where('created_at', '>=', Carbon::now()->subYear())->sum('ammount');
    //     return view('backend.expenses.expenses_list', compact('expenses', 'totalExpenses', 'lastEventExpenses', 'lastWeekExpenses', 'lastMonthExpenses', 'lastYearExpenses'));
    // }
    // old expenseListMain function code end

    public function index($id)
    {
        // echo date('Y-m-d');
        // die;
        $this->updateExpenseStatus();
        $expenses = Expenses::where('event_id', $id)->get();
        return view('backend.expenses.index', compact('expenses', 'id'));
    }

    //   index function start code
    // public function index($id)
    // {
    //     $expenses = Expenses::where('event_id', $id)->get();
    //     return view('backend.expenses.index', compact('expenses', 'id'));
    // }
    // code end


    public function create()
    {
        $event = Event::all();
        $booths = Booth::all();
        return view('backend.expenses.create', compact('event','booths'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'booth_id' => 'required|exists:booths,id',
            'expense_name' => 'required|string|max:20',
            'paid_by' => 'required|string|max:20',
            'ammount' => 'required|numeric',
            'due_date' => 'required|date',
            // 'contact_number' => 'required|digits_between:10,15',
            'category' => 'required|string|max:20',
            'expense_desgination' => 'required|string|max:50',
            'upload_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = new Expenses();
        $data->event_id = $validatedData['event_id'];
        $data->booth_id =  $validatedData['booth_id'];
        $data->expense_name = $validatedData['expense_name'];
        $data->paid_by = $validatedData['paid_by'];
        $data->ammount = $validatedData['ammount'];
        $data->due_date = $validatedData['due_date'];
        // $data->contact_number = $validatedData['contact_number'];
        $data->category = $validatedData['category'];
        $data->expense_desgination = $validatedData['expense_desgination'];

        if ($request->hasFile('upload_img')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('upload_img')->getClientOriginalExtension();
            $upload_img = now()->timestamp . $randomize . '.' . $extension;
            $request->file('upload_img')->move('upload_image/expenses/', $upload_img);
            $data->upload_img =  $upload_img;
        }
        $data->save();
        return redirect()->route('expenses', $request->event_id)->with('success', 'Expense data Store successfully.');
    }

    public function edit($id, $event_id)
    {
        $events  = Event::all();
        $expense = Expenses::find($id);
        return view('backend.expenses.edit', compact('expense', 'events', 'event_id'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'expense_name' => 'required|string|max:20',
            'paid_by' => 'required|string|max:20',
            'ammount' => 'required|numeric',
            'due_date' => 'required|date',
            // 'contact_number' => 'required|digits_between:10,15',
            'category' => 'required|string|max:20',
            'expense_desgination' => 'required|string|max:50',
            'upload_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $expense = Expenses::findOrFail($id);
        $expense->event_id = $validatedData['event_id'];
        $expense->expense_name = $validatedData['expense_name'];
        $expense->paid_by = $validatedData['paid_by'];
        $expense->ammount = $validatedData['ammount'];
        $expense->due_date = $validatedData['due_date'];
        // $expense->contact_number = $validatedData['contact_number'];
        $expense->category = $validatedData['category'];
        $expense->expense_desgination = $validatedData['expense_desgination'];

        if ($request->hasFile('upload_img')) {
            if ($expense->upload_img && file_exists(public_path('upload_image/expenses/' . $expense->upload_img))) {
                unlink(public_path('upload_image/expenses/' . $expense->upload_img));
            }

            $randomize = rand(111111, 999999);
            $extension = $request->file('upload_img')->getClientOriginalExtension();
            $upload_img = now()->timestamp . $randomize . '.' . $extension;
            $request->file('upload_img')->move('upload_image/expenses/', $upload_img);
            $expense->upload_img =  $upload_img;
        }
        $expense->save();

        return redirect()->route('expenses', $request->event_id)->with('success', 'Expense data updated successfully.');
    }

    public function destroy($id)
    {
        $expenses = Expenses::find($id);
        if (!$expenses) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        try {
            $expenses->delete();
            return redirect()->route('event.index')->with('success', 'Expenses deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the event.');
        }
    }

    // update exprince code start
    public function updateExpenseStatus()
    {

        // $expenses = Expenses::get();
        // foreach ($expenses as $expense) {
        //     if ($expense->due_date < now() && $expense->status !== 'paid') {
        //         $expense->status = 'overdue';
        //         $expense->save();
        //     }
        // }
        // dd(date("Y-m-d H:i:s"));
        $expenses = Expenses::where('status', '!=', 'paid')->get();
        foreach ($expenses as $expense) {
            if (date('Y-m-d', strtotime($expense->due_date)) < date('Y-m-d') && $expense->status !== 'overdue') {
                $expense->status = 'overdue';
                $expense->save();
            }
        }
    }
    // code end


    // updateStatus code start
    public function updateStatus(Request $request)
    {
        $payment = Expenses::find($request->id);

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
    //  code end

}
