<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BodyController;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Body;
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

    return view('landing.landing', compact('content', 'menus','body'));
})->name('landing');

// Admin CMS (bisa ditambah middleware auth)


Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('dashboard.index');
       
    })->name('home');

 Route::resource('content', ContentController::class);
        Route::resource('menu', MenuController::class);   
        Route::resource('body', BodyController::class);

});