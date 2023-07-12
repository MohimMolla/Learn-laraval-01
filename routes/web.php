<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WebsiteController::class, 'home']);
Route::middleware('auth')->group(function () {
    Route::get('about', [WebsiteController::class, 'about']);
    Route::get('services', [WebsiteController::class, 'services']);
    Route::get('testblade', [WebsiteController::class, 'testblade']);
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);
    
   
});

require __DIR__ . '/auth.php';
