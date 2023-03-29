<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashbordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProtfolioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('frontend.home'); //redirect home page
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashbord.layouts.dashbordtem');
    })->name('dashboard');


    /**
     *        dashbord controller
     */
    Route::controller(dashbordController::class)->group(function () {
        Route::get('/admin/dashbord', 'index')->name('admin.dashbord');
    });

    /**
     *        category controller
     */
    Route::controller(categoryController::class)->group(function () {
        Route::get('/create/categoty', 'create')->name('create.category');
        Route::post('/create/categoty', 'store')->name('store.category');
        Route::get('/edit/categoty/{id}', 'edit')->name('edit.category');
        Route::post('/edit/categoty/{id}', 'update')->name('update.category');
        Route::get('/destroy/categoty/{id}', 'destroy')->name('destroy.category');
        Route::get('/restor/categoty/{id}', 'restor')->name('restor.categoty');
        Route::get('/delete/categoty/{id}', 'delete')->name('delete.categoty');
    });

    /**
     *        protfolio controller
     */
    Route::controller(ProtfolioController::class)->group(function () {
        Route::get('/create/protfolio/post', 'create')->name('create.protfolio');
        Route::post('/create/protfolio/post', 'store')->name('store.protfolio');
        Route::get('/show/protfolio', 'index')->name('show.protfolio');
        Route::get('/edit/protfolio/{id}', 'edit')->name('edit.protfolio');
        Route::post('/edit/protfolio/{id}', 'update')->name('update.protfolio');
        Route::get('/destroy/protfolio/{id}', 'destroy')->name('destroy.protfolio');
        Route::get('/restor/protfolio/{id}', 'restor')->name('restor.protfolio');
        Route::get('/delete/protfolio/{id}', 'delete')->name('delete.protfolio');
    });

    /**
     *        About controller
     */
    Route::controller(AboutController::class)->group(function () {
        Route::get('/create/about', 'create')->name('create.about');
        Route::post('/create/about', 'store')->name('store.about');
    });
});
/**
 * contact form send mail
 */
Route::post('/send/mail', [HomeController::class, 'send'])->name('send.email');
