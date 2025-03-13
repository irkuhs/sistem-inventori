<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Color Management Routes
Route::resource('color', ColorController::class);

//Type Management Routes
Route::resource('type', TypeController::class);

//Item Management Routes
Route::resource('item', ItemController::class)->except([
    'index'
]);
