<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ArticleController;
use App\Http\Controller\AuthorsController;
use App\Http\Controller\CategoryController;
use App\Http\Controller\ContentController;
use App\Http\Controller\TypeController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');
    // Route::name('dashboard.')->group(function( {
    Route::prefix('dashboard/')->group(function (){
        // Route artikel
        Route::resource('article', Backend\ArticleController::class, ['names' => ['index' => 'article']]);
        // Route author
        Route::resource('authors', Backend\AuthorsController::class, ['names' => ['index' => 'authors']]);
        // Route Content
        Route::resource('content', Backend\ContentController::class, ['names' => ['index' => 'content']]);
        // Route Admin
        Route::resource('pengguna-admin','Backend\AdminController',['names'=> ['index' =>'pengguna-admin']]);
        // Route tampilan menghitung data
        Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');
        
        //Reset Password
        Route::get('edit-password/', 'Backend\AdminController@editPassword')->name('edit-password');
        Route::post('edit-password/', 'Backend\AdminController@updatePassword')->name('update-password');
        // Route::get('reset-password/', 'Backend\AdminController@updatePassword')->name('update-password');
    });
});


// Route::middleware(['auth'])->group(function () {
    Route::get('/','Backend\DashboardController@landingPage')->name('welcome');
    Route::get('detail-artikel/{slug}', 'Backend\DashboardController@detailArtikel')->name('welcome-detail');
//     Route::prefix('admin')->group(function )
// });
require __DIR__.'/auth.php';
