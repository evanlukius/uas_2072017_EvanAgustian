<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\StudentPlacementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('studentplacements', [StudentPlacementController::class, 'index'])->name('studentplacements.index');
    Route::get('/studentplacements/create', [StudentPlacementController::class, 'create'])->name('studentplacements.create');
    Route::get('periods', [PeriodController::class, 'index'])->name('periods.index');
    Route::get('/periodss/create', [PeriodController::class, 'create'])->name('periods.create');


    
    Route::get('periods/create', [PeriodController::class, 'create'])->name('periods.create');
    Route::resource('periods', PeriodController::class);
    Route::resource('students', StudentController::class);
    Route::resource('placements', StudentPlacementController::class);
    Route::resource('studentplacements', StudentPlacementController::class);


});

