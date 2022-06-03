<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/tasks');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


use App\Http\Livewire\Tasks;

Route::get('tasks', Tasks::class)->middleware('auth');

// use App\Http\Controllers\CountdownTimerController;

#Countdown timer example
// Route::get('/create-timer', [CountdownTimerController::class, 'create']);
// Route::post('/update-timer', [CountdownTimerController::class, 'update'])->name('timer.update');
// Route::get('/view-timer', [CountdownTimerController::class, 'view']);
