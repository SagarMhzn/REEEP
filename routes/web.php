<?php

use App\Models\WorkingArea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\WorkingAreaController;

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

Route::get('/about-us', [HomeController::class, 'viewAbout'])->name('about');
Route::get('/working_areas', [HomeController::class, 'viewWorkingAreas'])->name('workingareas');
// Route::get('/about-us',[HomeController::class, 'viewNews'])->name('news');
// Route::get('/about-us',[HomeController::class, 'viewContactUs'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
// Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::name('backend.')->middleware('auth')->group(function () {

    Route::name('menu.')->group(function () {

        Route::get('/dashboard/menu/create', [MenuController::class, 'create'])->name('create');
        Route::post('/dashboard/menu/create', [MenuController::class, 'store'])->name('store');

        Route::get('/dashboard/menu/list', [MenuController::class, 'show'])->name('list');
        Route::get('/dashboard/menu/list/{id}', [MenuController::class, 'showChild'])->name('childlist');

        Route::get('/dashboard/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::put('/dashboard/menu/edit/{id}', [MenuController::class, 'update'])->name('update');

        Route::get('/dashboard/menu/delete/{id}', [MenuController::class, 'destroy'])->name('delete');
    });

    Route::name('aboutus.')->group(function () {

        Route::get('/dashboard/about-us/create', [AboutUsController::class, 'create'])->name('create');
        Route::post('/dashboard/about-us/create', [AboutUsController::class, 'store'])->name('store');

        Route::get('/dashboard/about-us/list', [AboutUsController::class, 'show'])->name('list');

        Route::get('/dashboard/about-us/edit/{id}', [AboutUsController::class, 'edit'])->name('edit');
        Route::put('/dashboard/about-us/edit/{id}', [AboutUsController::class, 'update'])->name('update');

        Route::get('/dashboard/about-us/delete/{id}', [AboutUsController::class, 'destroy'])->name('delete');
    });

    Route::name('workingareas.')->group(function () {

        Route::get('/dashboard/working-areas/create', [WorkingAreaController::class, 'create'])->name('create');
        Route::post('/dashboard/working-areas/create', [WorkingAreaController::class, 'store'])->name('store');

        Route::get('/dashboard/working-areas/list', [WorkingAreaController::class, 'show'])->name('list');

        Route::get('/dashboard/working-areas/edit/{id}', [WorkingAreaController::class, 'edit'])->name('edit');
        Route::put('/dashboard/working-areas/edit/{id}', [WorkingAreaController::class, 'update'])->name('update');

        Route::get('/dashboard/working-areas/delete/{id}', [WorkingAreaController::class, 'destroy'])->name('delete');
    });

});
