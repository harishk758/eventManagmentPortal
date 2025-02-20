<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\ChecklistTask;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EventTeamAssignment;
use App\Models\Expenses;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $all_event = Event::withCount('booths')->get();
        $today = Carbon::today();
        $pastEvents = Event::where('end_date', '<', $today)->count();
        $upcomingEvents = Event::where('start_date', '>', $today)->count();
        $runningEvents = Event::where('start_date', '<=', $today)->where('end_date', '>=', $today)->count();
        return view('backend.dashboard', compact('pastEvents', 'upcomingEvents', 'runningEvents', 'all_event'));
    } 

    public function eventSummary($id)
    {
        $id = base64_decode($id);
        $eventDetails = Event::where('id', $id)->with('booths.vendors')->first();
        $allTeamMembers = EventTeamAssignment::where('event_id', $id)->with('member')->get();
        $allChecklists = ChecklistTask::where('event_id', $id)->with('teamMember')->get();
        $allExpenses = Expenses::where('event_id', $id)->get();
        $perPage = 10;
        $teamCurrentPage = request()->get('team_page', 1);
        $checklistCurrentPage = request()->get('checklist_page', 1);
        $expenseCurrentPage = request()->get('expense_page', 1);
        $teamOffset = ($teamCurrentPage - 1) * $perPage;
        $checklistOffset = ($checklistCurrentPage - 1) * $perPage;
        $expenseOffset = ($expenseCurrentPage - 1) * $perPage;
        $teamMembers = new LengthAwarePaginator(
            $allTeamMembers->slice($teamOffset, $perPage)->values(),
            $allTeamMembers->count(),
            $perPage,
            $teamCurrentPage,
            ['path' => request()->url(), 'pageName' => 'team_page']
        );
        $checklists = new LengthAwarePaginator(
            $allChecklists->slice($checklistOffset, $perPage)->values(),
            $allChecklists->count(),
            $perPage,
            $checklistCurrentPage,
            ['path' => request()->url(), 'pageName' => 'checklist_page']
        );
        $expenses = new LengthAwarePaginator(
            $allExpenses->slice($expenseOffset, $perPage)->values(),
            $allExpenses->count(),
            $perPage,
            $expenseCurrentPage,
            ['path' => request()->url(), 'pageName' => 'expense_page']
        );
        if (!empty($eventDetails)) {
            return view('backend.eventsummary', compact('eventDetails', 'teamMembers', 'checklists', 'expenses'));
        } else {
            return redirect()->back()->with('error', 'Something Wet Wrong!');
        }
    }

    public function downloadEventSummary($id)
    {
        $id = base64_decode($id);
        $eventDetails = Event::where('id', $id)->with('booths.vendors')->first();
        $allTeamMembers = EventTeamAssignment::where('event_id', $id)->with('member')->get();
        $allChecklists = ChecklistTask::where('event_id', $id)->get();
        $allExpenses = Expenses::where('event_id', $id)->get();
    
        if (!empty($eventDetails)) {
            $pdf = Pdf::loadView('backend.eventsummary_pdf', compact('eventDetails', 'allTeamMembers', 'allChecklists', 'allExpenses'));
            return $pdf->download('event_summary.pdf');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
