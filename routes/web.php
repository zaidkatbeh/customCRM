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
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/users')->controller(App\Http\Controllers\user\userController::class)->group(function(){
    Route::get('/','index')->name('users');
    Route::get('/{user}','edit');
    Route::post('/{user}/update','update');
    Route::post('/{user}/delete','destroy');
});
Route::get('/clients',[App\Http\Controllers\user\userController::class,'showclientsonly'])->name('clients');
Route::get('user/profile',[App\Http\Controllers\user\userController::class, 'showProfile']);


Route::prefix('/projects')->controller(App\Http\Controllers\projectsController::class)->group(function(){
    Route::get('/','index')->name('projects');
    Route::get('/add','create');
    Route::post('/store','store');
    Route::get('/{project}','edit');
    Route::post('/{user}/update','update');
    Route::post('/{project}/delete','destroy');

});
Route::prefix('/tasks')->controller(App\Http\Controllers\taskController::class)->group(function(){
    Route::get('/','index')->name('tasks');
    Route::get('/add','create');
    Route::post('store','store');
    Route::get('/{task}','edit');
    Route::post('/{task}/update','update');
    Route::post('/{task}/delete','destroy');
});
