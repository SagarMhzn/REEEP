<?php

use App\Models\WorkingArea;
use App\Models\NewsAndEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\WorkingAreaController;
use App\Http\Controllers\NewsAndEventController;
use App\Http\Controllers\PartnerController;

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

Route::prefix('dashboard')->name('backend.')->middleware('auth')->group(function () {

    Route::name('menu.')->group(function () {

        Route::get('/menu/create', [MenuController::class, 'create'])->name('create');
        Route::post('/menu/create', [MenuController::class, 'store'])->name('store');

        Route::get('/menu/list', [MenuController::class, 'show'])->name('list');
        Route::get('/menu/list/{id}', [MenuController::class, 'showChild'])->name('childlist');

        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::put('/menu/edit/{id}', [MenuController::class, 'update'])->name('update');

        Route::get('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('delete');
    });

    Route::name('aboutus.')->group(function () {

        Route::get('/about-us/create', [AboutUsController::class, 'create'])->name('create');
        Route::post('/about-us/create', [AboutUsController::class, 'store'])->name('store');

        Route::get('/about-us/list', [AboutUsController::class, 'show'])->name('list');

        Route::get('/about-us/edit/{id}', [AboutUsController::class, 'edit'])->name('edit');
        Route::put('/about-us/edit/{id}', [AboutUsController::class, 'update'])->name('update');

        Route::get('/about-us/delete/{id}', [AboutUsController::class, 'destroy'])->name('delete');
    });

    Route::name('workingareas.')->group(function () {

        Route::get('/working-areas/create', [WorkingAreaController::class, 'create'])->name('create');
        Route::post('/working-areas/create', [WorkingAreaController::class, 'store'])->name('store');

        Route::get('/working-areas/list', [WorkingAreaController::class, 'show'])->name('list');

        Route::get('/working-areas/edit/{id}', [WorkingAreaController::class, 'edit'])->name('edit');
        Route::put('/working-areas/edit/{id}', [WorkingAreaController::class, 'update'])->name('update');

        Route::get('/working-areas/delete/{id}', [WorkingAreaController::class, 'destroy'])->name('delete');
    });

    Route::name('news-and-events.')->group(function () {

        Route::get('/news-and-events/create', [NewsAndEventController::class, 'create'])->name('create');
        Route::post('/news-and-events/create', [NewsAndEventController::class, 'store'])->name('store');

        Route::get('/news-and-events/list', [NewsAndEventController::class, 'show'])->name('list');

        Route::get('/news-and-events/edit/{id}', [NewsAndEventController::class, 'edit'])->name('edit');
        Route::put('/news-and-events/edit/{id}', [NewsAndEventController::class, 'update'])->name('update');

        Route::get('/news-and-events/delete/{id}', [NewsAndEventController::class, 'destroy'])->name('delete');
    });
    
    Route::name('partners.')->group(function () {

        Route::get('/partners/create', [PartnerController::class, 'create'])->name('create');
        Route::post('/partners/create', [PartnerController::class, 'store'])->name('store');

        Route::get('/partners/list', [PartnerController::class, 'show'])->name('list');

        Route::get('/partners/edit/{partners}', [PartnerController::class, 'edit'])->name('edit');
        Route::put('/partners/edit/{partners}', [PartnerController::class, 'update'])->name('update');

        Route::get('/partners/delete/{partners}', [PartnerController::class, 'destroy'])->name('delete');
    });

    Route::resource('knowledge',KnowledgeController::class);
    Route::put('/knowledge/update/{knowledge}', [KnowledgeController::class, 'update'])->name('knowledge.update');

});
