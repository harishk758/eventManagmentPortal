<?php

use App\Http\Controllers\Backend\BoothController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\TeamAssignEventController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\ChecklistController;
use App\Http\Controllers\Backend\ExpensesController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/event/summary/{id}', [HomeController::class, 'eventSummary'])->name('eventSummary');

Route::get('event', [EventController::class, 'index'])->name('event');

Route::get('add_event', [EventController::class, 'create'])->name('add_event');

Route::post('event_store', [EventController::class, 'store'])->name('event_store');

Route::get('event_edit/{id}', [EventController::class, 'edit'])->name('event_edit');

Route::post('event_update/{id}', [EventController::class, 'update'])->name('event_update');

Route::delete('event_delete/{id}', [EventController::class, 'destroy'])->name('event_delete');

// Route::resource('event', EventController::class);

Route::get('booth', [BoothController::class, 'index'])->name('booth');

Route::get('add_booth', [BoothController::class, 'create'])->name('add_booth');

Route::post('booth_store', [BoothController::class, 'store'])->name('booth_store');
Route::get('booth/edit/{id}', [BoothController::class, 'edit'])->name('booth.edit');
Route::post('booth/update/{id}', [BoothController::class, 'update'])->name('booth_update');
Route::delete('/booth/delete/{id}', [BoothController::class, 'destroy'])->name('booth.delete');
Route::resource('team', TeamController::class);

// Route::get('team', [TeamController::class, 'index'])->name('team');

// Route::get('/add_team', [TeamController::class, 'create'])->name('add_team');

//team member event assignment routes
Route::get('/event/assign/{member_id}', [TeamAssignEventController::class, 'assignToEvent'])->name('event.assign');
Route::post('/event/assign', [TeamAssignEventController::class, 'storeEventAssignment'])->name('event.storeAssignment');
// Route::post('/event/edit/{assignment_id}', [TeamAssignEventController::class, 'edit'])->name('event.edit');
Route::get('/assignment/{assignment_id}/edit', [TeamAssignEventController::class, 'edit'])->name('event.editAssignment');
Route::put('/assignment/{assignment_id}/update', [TeamAssignEventController::class, 'updateEventAssignment'])->name('event.updateAssignment');
Route::delete('/team-assignment/{id}', [TeamAssignEventController::class, 'destroy'])->name('event.deleteAssignment');

Route::get('/get-booths/{event_id}', [BoothController::class, 'getBooths'])->name('get.booths');

Route::get('/checklist_task/main', [ChecklistController::class, 'checklist_main'])->name('checklist_task.main');
Route::get('/checklist_task/{event_id}', [ChecklistController::class, 'index'])->name('checklist_task');
Route::get('/add_cklist_task', [ChecklistController::class, 'create'])->name('add_cklist_task');
Route::post('/cklist_task_store', [ChecklistController::class, 'store'])->name('cklist_task_store');
Route::get('/cklist_task_edit/{id}/{event_id}', [ChecklistController::class, 'edit'])->name('cklist_task_edit');
Route::post('/cklist_task_update/{id}', [ChecklistController::class, 'update'])->name('cklist_task_update');
Route::delete('/cklist_task_delete/{id}', [ChecklistController::class, 'destroy'])->name('cklist_task_delete');
Route::post('/update-checklist-status', [ChecklistController::class, 'updateChecklistStatus'])->name('update.checklist.status');

Route::get('/expenses/main', [ExpensesController::class, 'expenseListMain'])->name('expenses.main');
Route::get('/expenses/{id}', [ExpensesController::class, 'index'])->name('expenses');
Route::get('/add/expenses', [ExpensesController::class, 'create'])->name('create.expenses');
Route::post('/store/expenses', [ExpensesController::class, 'store'])->name('store.expenses');
Route::get('/edit/expenses/{id}/{event_id}', [ExpensesController::class, 'edit'])->name('edit.expenses');
Route::post('/update/expenses/{id}', [ExpensesController::class, 'update'])->name('expenses.update');
Route::delete('/delete/expenses/{id}', [ExpensesController::class, 'destroy'])->name('expenses.delete');

Route::post('/update-status', [ExpensesController::class, 'updateStatus'])->name('update.status');


//pdf route
Route::get('/event-summary/download/{id}', [HomeController::class, 'downloadEventSummary'])->name('event.summary.download');








