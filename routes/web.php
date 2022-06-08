<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;

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

//Categorias

Route::get('admin/categories', [CategoryController::class, 'index']) -> name('categories.index');
Route::get('admin/categories/create', [CategoryController::class, 'create']) -> name('categories.create');

Route::post('admin/categories/save', [CategoryController::class, 'save']) -> name('categories.save');
Route::get('admin/categories/{id}/edit/', [CategoryController::class, 'edit']) -> name('categories.edit');
Route::post('admin/categories/{id}/update', [CategoryController::class, 'update']) -> name('categories.update');
Route::post('admin/categories/{id}/delete', [CategoryController::class, 'delete']) -> name('categories.delete');


//Route::get('/categorias', [CategoryController::class, 'index']);

Route::get('/nosotros', function () {
    return view('nosotros');
});



