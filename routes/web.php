<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\Admin\EventController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('admin/events', [EventController::class, 'index']) -> name('events.index');
Route::get('admin/events/create', [EventController::class, 'create']) -> name('events.create');

Route::post('admin/events/save', [EventController::class, 'save']) -> name('events.save');
Route::get('admin/events/{id}/edit/', [EventController::class, 'edit']) -> name('events.edit');
Route::post('admin/events/{id}/update', [EventController::class, 'update']) -> name('events.update');
Route::post('admin/events/{id}/delete', [EventController::class, 'delete']) -> name('events.delete');

Route::get('/categorias', [EventCategoryController::class, 'index']);

Route::get('/nosotros', function () {
    return view('nosotros');
});



