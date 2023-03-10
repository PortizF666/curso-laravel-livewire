<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    //CRUDS

    Route::group(['prefix' => 'category'], function () {
       Route::get('/', App\Http\Livewire\Dashboard\Category\Index::class)->name("d-category-index");
       Route::get('/create', App\Http\Livewire\Dashboard\Category\Save::class)->name("d-category-create");
       Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Category\Save::class)->name("d-category-edit"); 
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', App\Http\Livewire\Dashboard\Post\Index::class)->name("d-post-index");
        Route::get('/create', App\Http\Livewire\Dashboard\Post\Save::class)->name("d-post-create");
        Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Post\Save::class)->name("d-post-edit"); 
     });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', App\Http\Livewire\Contact\General::class)->name("contact");
     });
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', App\Http\Livewire\Blog\Index::class)->name("web-index");
        Route::get('/{slug}', App\Http\Livewire\Blog\Show::class)->name("web-show");
    });
});
