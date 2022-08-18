<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
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

Route::get('/',[GameController::class,'showList'])->name('games');
Route::get('/game/create',[GameController::class,'showCreate'])->name('create');
Route::post('/game/store',[GameController::class,'exeStore'])->name('store');
Route::get('/game/{id}',[GameController::class,'showDetail'])->name('show');
Route::get('/game/edit/{id}',[GameController::class,'showEdit'])->name('edit');
Route::post('/game/update',[GameController::class,'exeUpdate'])->name('update');
Route::post('/game/delete/{id}',[GameController::class,'exeDelete'])->name('delete');
