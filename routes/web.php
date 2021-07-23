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



Route::middleware(['auth'])->group(function () {
    // Route::name('dashboard.')->group(function( {
    Route::prefix('dashboard')->group(function (){
        // Route artikel
        Route::resource('article', Backend\ArticleController::class, ['names' => [
        'index' => 'article'
    ]]);
    // Route author
    Route::resource('authors', Backend\AuthorsController::class, ['names' => [
        'index' => 'authors'
        ]]);
    // Route Category
    Route::resource('category', Backend\CategoryController::class, ['names' => [
        'index' => 'category'
        ]]);
    // Route Content
    Route::resource('content', Backend\ContentController::class, ['names' => [
        'index' => 'content'
        ]]);
    // Route Type
    Route::resource('type', Backend\TypeController::class, ['names' => [
        'index' => 'type'
        ]]);
    // Route Admin
    Route::resource('pengguna-admin','Backend\AdminController',['names'=> [
        'index' =>'pengguna-admin'
    ]]);

     //Reset Password
     Route::get('edit-password/', 'Backend\AdminController@editPassword')->name('edit-password');
     Route::post('edit-password/', 'Backend\AdminController@updatePassword')->name('update-password');

    // change status
    Route::get('content/change_status/{id}/{status}', 'Backend\ContentController@changeStatus')->name('change-status');
    });
});

// Route tampilan menghitung data
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');
// Route::middleware(['auth'])->group(function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Route::get('/','Backend\DashboardController@landingPage')->name('welcome');
    Route::get('/','LandingPageController@index')->name('welcome');
    Route::get('/detail_artikel/{slug}','LandingPageController@detailArticle')->name('detail_artikel');

require __DIR__.'/auth.php';
