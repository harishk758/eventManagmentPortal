<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Expenses;

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
        //  $totalAmount = Expenses::sum('ammount');
        //  dd($totalAmount);
         $all_event = Event::withCount('booths')->get();
         $today = Carbon::today();
         $pastEvents = Event::where('end_date', '<', $today)->count();
         $upcomingEvents = Event::where('start_date', '>', $today)->count();
         $runningEvents = Event::where('start_date', '<=', $today)->where('end_date', '>=', $today)->count();

         return view('backend.dashboard', compact('pastEvents', 'upcomingEvents', 'runningEvents', 'all_event'));
     }

}
