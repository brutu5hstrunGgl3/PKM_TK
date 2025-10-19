<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BodyController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\Admin\EventController;

use App\Models\Content;
use App\Models\Menu;
use App\Models\Body;
use App\Models\Setting;
use App\Models\Logo;

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
})->name('blog');;

// Route::get('/login', function () {
//     return view('auth.auth-login2');
// });


// Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/', function () {
    $content = Content::latest()->first();
    $menus = Menu::orderBy('order')->get();
    $body = Body::latest()->first();
    $logo = Setting::first();

    return view('landing.landing', compact('content', 'menus','body','logo'));
})->name('landing');

// Admin CMS (bisa ditambah middleware auth)


Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('dashboard.index');
       
    })->name('home');

 Route::resource('content', ContentController::class);
        Route::resource('menu', MenuController::class);   
        Route::resource('body', BodyController::class);

       
    Route::get('logo', [LogoController::class, 'index'])->name('logo.index');
    Route::post('logo/update', [LogoController::class, 'update'])->name('logo.update');
      Route::resource('events', EventController::class);
    

});