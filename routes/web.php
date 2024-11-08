<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
//admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EpisodeController;

Route::get('/',[IndexController::class,'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class,'specie'])->name('specie');
Route::get('/quoc-gia/{slug}',[IndexController::class,'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'detail'])->name('detail');
Route:: get ('/nam/{year}', [IndexController :: class, 'year']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route admin
Route::resource('category', CategoryController::class);
Route::post('resorting', [CategoryController::class, 'resorting'])->name('resorting');

Route::resource('specie', SpecieController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('detail', DetailController::class);
Route:: get ('/update-year-phim', [DetailController :: class, 'update_year']);


