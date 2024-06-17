<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GroceryController;

Route::post('/toggle-checkbox/{id}', [GroceryController::class, 'toggleCheckbox']);
Route::post('/receipt/{date}', [GroceryController::class, 'getItemDate']);
Route::post('/changeTheme/{theme}', [GroceryController::class, 'changeTheme']);

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/text-write', 'GroceryController@storeBarang')->name('storeBarang');
// Route::post('/text-write', [GroceryController::class, 'storeBarang']);

Route::get('/home', [GroceryController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::post('/home', [GroceryController::class, 'storeBarang'])->middleware(['auth', 'verified']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

    
require __DIR__.'/auth.php';
