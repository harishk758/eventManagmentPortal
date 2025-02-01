<?php

use App\Http\Controllers\Backend\BoothController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\TeamController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('event', [EventController::class, 'index'])->name('event');

Route::get('add_event', [EventController::class, 'create'])->name('add_event');

Route::post('event_store', [EventController::class, 'store'])->name('event_store');

Route::get('booth', [BoothController::class, 'index'])->name('booth');

Route::get('add_booth', [BoothController::class, 'create'])->name('add_booth');

Route::post('booth_store', [BoothController::class, 'store'])->name('booth_store');

Route::resource('team', TeamController::class);

// Route::get('team', [TeamController::class, 'index'])->name('team');

// Route::get('/add_team', [TeamController::class, 'create'])->name('add_team');
