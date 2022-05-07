<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;

use App\Models\Client;

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


//Route::get('/dashboard',[AdminDashboardController::class,'show_dashboard'])->name('dashboard');
/*
Route::resource('home',HomeController::class);
Route::resource('users',UsersController::class);
Route::resource('clients',ClientsController::class);
Route::resource('projects',ProjectsController::class);
Route::resource('tasks',TasksController::class);
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    //Route::post('/orders', 'store');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/users', 'index')->name('users');

});

Route::controller(ClientsController::class)->group(function () {
    Route::get('/clients', 'index')->name('clients');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::get('/destroy/{id}','destroy');

});

Route::controller(ProjectsController::class)->group(function () {
    Route::get('/projects', 'index')->name('projects');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::get('/destroy/{id}','destroy');
});
Route::controller(TasksController::class)->group(function () {
    Route::get('/tasks', 'index')->name('tasks');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::get('/destroy/{id}','destroy');

});



require __DIR__.'/auth.php';
