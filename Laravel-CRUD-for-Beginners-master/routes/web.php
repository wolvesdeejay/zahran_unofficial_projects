<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




// https://www.youtube.com/watch?v=f1hCx-NXbek - Timestamp:09:04
// https://github.com/devtamin/Laravel-CRUD-for-Beginners/blob/master/routes/web.php
use App\Http\Controllers\ProductController;


// use App\Http\Controllers\DashboardController;




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

Route::get('/', function () {
    return view('welcome');
});




// https://www.youtube.com/watch?v=f1hCx-NXbek - Timestamp:09:04
// https://github.com/devtamin/Laravel-CRUD-for-Beginners/blob/master/routes/web.php
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
// Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
// Route::get('/dashboard/{dashboard}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
// Route::put('/dashboard/{dashboard}/update', [DashboardController::class, 'update'])->name('dashboard.update');
// Route::delete('/dashboard/{dashboard}/destroy', [DashboardController::class, 'destroy'])->name('dashboard.destroy');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
