<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BodyController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ContactController;

use App\Models\Content;
use App\Models\Menu;
use App\Models\Body;
use App\Models\Setting;
use App\Models\Logo;
use App\Models\Event;
use App\Models\Teams;
use App\Models\Contact;

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

Route::get('blog', function () {
    return view('landing.blog');
})->name('blog');



Route::get('404', function () {
    return view('landing.404');
})->name('404');
// Route::get('/login', function () {
//     return view('auth.auth-login2');
// });

Route::get('/informasi', function () {
    $content = Content::latest()->first();
    $menus = Menu::orderBy('order')->get();
    $body = Body::latest()->first();
    $logo = Setting::first();
    $teams = Teams::latest()->get();
    $contact = Contact::first();
    $events= Event::where('is_published', true)
        ->latest()
        ->get();


    return view('landing.informasi', compact('content', 'menus','body','logo','events','teams','contact'));
})->name('informasi');

// Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/', function () {
    $content = Content::latest()->first();
    $menus = Menu::orderBy('order')->get();
    $body = Body::latest()->first();
    $logo = Setting::first();
    $teams = Teams::latest()->get();
    $contact = Contact::first();
    $events= Event::where('is_published', true)
        ->latest()
        ->get();


    return view('landing.landing', compact('content', 'menus','body','logo','events','teams','contact'));
})->name('landing');
// Route::get('landing', [LandingPageController::class, 'index'])->name('landing');
// Admin CMS (bisa ditambah middleware auth)


Route::middleware('admin.area')->group(function () {
    Route::get('home', function () {
        return view('dashboard.index');
    })->name('home');

    Route::resource('content', ContentController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('body', BodyController::class);

    Route::get('logo', [LogoController::class, 'index'])->name('logo.index');
    Route::post('logo/update', [LogoController::class, 'update'])->name('logo.update');

    Route::resource('events', EventController::class)->except(['show']);
    Route::resource( 'teams', TeamsController::class );
    Route::resource('contact', ContactController::class );
});



   

