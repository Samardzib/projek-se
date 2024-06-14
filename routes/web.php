<?php

use App\Exports\UsersExport;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PomodoroController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ToDolistController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MusicController;

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
    if (Auth::check()) {
        return view('welcome');
    } else {
        return view('auth.login');
    }
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin', function() {
            return view("admin.dashboard");
        })->name('admin.dashboard');
        Route::resource('users', UserController::class);
    });

    Route::get('/anggota', function() {
        return view("admin.dashboard");
    })->name('anggota.dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('pomodoro', PomodoroController::class)->only(['index']);
    Route::resource('calender', CalenderController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('todolist', ToDoListController::class);
    Route::resource('notification', NotificationController::class);
    Route::resource('music', MusicController::class);
});


Route::get('export-users', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
})->name('users.export');