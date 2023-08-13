<?php

use App\Models\Lang;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Knowledge;
use App\Models\WorkingArea;
use App\Models\NewsAndEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\WorkingAreaController;
use App\Http\Controllers\NewsAndEventController;

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
    return redirect(route('frontend.home'));
});

//HomeController Routes

Route::name('frontend.')->group(function () {


    Route::get('/test', [HomeController::class, 'test'])->name('test');
    Route::get('/gallerytest', [HomeController::class, 'galleryTest']);
    Route::get('/contacttest', [HomeController::class, 'contactTest']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about');
    
    
    Route::name('gallery.')->group(function () {
        Route::get('/gallery', [GalleryController::class, 'view'])->name('index');
        Route::get('/gallery/album/{id}', [GalleryController::class, 'viewAlbum'])->name('album');
    });

    Route::name('workingareas.')->group(function () {
        Route::get('/areas', [HomeController::class, 'workingareas'])->name('workingareas');
        Route::get('/areas/{id}', [HomeController::class, 'viewArea'])->name('area');
    });
    
    Route::name('news-and-events.')->group(function () {
        Route::get('/news-and-events', [NewsAndEventController::class, 'viewMain'])->name('main');
        Route::get('/news-and-events/{id}', [NewsAndEventController::class, 'viewArticle'])->name('view-article');
        Route::post('/get-entry', [NewsAndEventController::class, 'getEntry'])->name('getEntry');
        Route::post('/get-entry-inner', [NewsAndEventController::class, 'getEntryInner'])->name('getEntry-inner');
    });
    
    Route::name('resources.')->group(function () {
        Route::get('/resources', [KnowledgeController::class, 'view'])->name('index');
    });


    Route::resource('message', MessageController::class);
    // Route::get('/about-us',[HomeController::class, 'viewNews'])->name('news');
    // Route::get('/about-us',[HomeController::class, 'viewContactUs'])->name('about');
    // Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
    // Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
    // Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
    // Route::get('/about-us',[HomeController::class, 'viewAbout'])->name('about');
});

Route::get('/lang/home', [LangController::class, 'view']);
Route::get('/lang/change', [LangController::class, 'change'])->name('changeLang');


Route::prefix('/dashboard')->name('backend.')->middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'admin_index'])->name('home');

    Route::name('admin.')->group(function () {
        Route::get('/profile', [AdminController::class, 'admin_profile'])->name('profile');
        Route::put('/profile/{id}', [AdminController::class, 'updateProfile'])->name('update-profile');
        Route::put('/password/{id}', [AdminController::class, 'updatePassword'])->name('update-password');
    });
    Route::name('menu.')->group(function () {

        Route::get('/menu/create', [MenuController::class, 'create'])->name('create');
        Route::post('/menu/create', [MenuController::class, 'store'])->name('store');

        Route::get('/menu/list', [MenuController::class, 'show'])->name('list');
        Route::get('/menu/list/{id}', [MenuController::class, 'showChild'])->name('childlist');

        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::put('/menu/edit/{id}', [MenuController::class, 'update'])->name('update');

        Route::get('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('delete');

        Route::get('/menu/toggle-status/{id}', [MenuController::class, 'toggle'])->name('toggleStatus');
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

    Route::resource('knowledge', KnowledgeController::class);
    Route::put('/knowledge/update/{knowledge}', [KnowledgeController::class, 'update'])->name('knowledge.update');

    Route::resource('banner', BannerController::class);
    // Route::put('/banner/update/{banner}', [BannerController::class, 'update'])->name('banner.update');

    Route::resource('lang', LangController::class);

    Route::resource('album', AlbumController::class);

    Route::resource('gallery', GalleryController::class);

    Route::resource('contact', ContactController::class);

    Route::resource('message', MessageController::class);

    Route::resource('socials', SocialController::class);

    Route::resource('roles', RoleController::class);
    
    Route::resource('users', UserController::class);
});
