<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Color Management Routes
// Route::get('/color', [ColorController::class, 'index'])->name('color.index');
// Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
// Route::post('/color/store', [ColorController::class, 'store'])->name('color.store');
// Route::get('/color/edit/{color}', [ColorController::class, 'edit'])->name('color.edit');
// Route::post('/color/update/{color}', [ColorController::class, 'update'])->name('color.update');
// Route::get('/color/delete/{color}', [ColorController::class, 'destroy'])->name('color.delete');
Route::resource('color', ColorController::class);
