<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
Route::get('/working_areas',[HomeController::class, 'viewWorkingAreas'])->name('workingareas');
// Route::get('/about-us',[HomeController::class, 'viewNews'])->name('news');
// Route::get('/about-us',[HomeController::class, 'viewContactUs'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');


Route::get('menus','MenuController@index');
Route::get('menus-show','MenuController@show');
Route::post('menus','MenuController@store')->name('menus.store');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard/menu/create', [MenuController::class, 'create'])->name('backend.menu-create');
Route::post('/dashboard/menu/create', [MenuController::class, 'store'])->name('backend.menu-store');

Route::get('/dashboard/menu/list', [MenuController::class, 'show'])->name('backend.menu-list');
Route::get('/dashboard/menu/list/{id}', [MenuController::class, 'showChild'])->name('backend.menu-childlist');

Route::get('/dashboard/menu/edit/{id}', [MenuController::class, 'edit'])->name('backend.menu-edit');
Route::put('/dashboard/menu/edit/{id}', [MenuController::class, 'update'])->name('backend.menu-update');
