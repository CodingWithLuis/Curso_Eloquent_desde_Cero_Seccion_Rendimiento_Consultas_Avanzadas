<?php

use App\Http\Controllers\AggregatesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubqueriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('projects', ProjectController::class);

Route::resource('users', UserController::class)->only('index');

Route::get('subqueries', [SubqueriesController::class, 'index'])->name('subqueries.index');
Route::get('aggregates', [AggregatesController::class, 'index'])->name('aggregates.index');
