<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index']);

Route::post('/add',[ActivitiesController::class,"index"] )->name('add');
Route::post('/edit',[ActivitiesController::class,"edit"] )->name('edit');
Route::get('/activity/{id}',[ActivitiesController::class,"activitydetail"]);
Route::get('/delete/{id}',[ActivitiesController::class,"delete"] )->name('delete');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
