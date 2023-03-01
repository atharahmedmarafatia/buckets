<?php

use App\Http\Controllers\BallController;
use App\Http\Controllers\BallQuantityController;
use App\Http\Controllers\BucketsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('buckets/create', [BucketsController::class, 'create'])->name('buckets.create');
    Route::post('buckets/store', [BucketsController::class, 'store'])->name('buckets.store');


    Route::get('ball/create', [BallController::class, 'create'])->name('ball.create');
    Route::post('ball/store', [BallController::class, 'store'])->name('ball.store');


    Route::get('dashboard', [BallQuantityController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('ballq/create', [BallQuantityController::class, 'create'])->name('ballq.create');
    Route::post('ballq/store', [BallQuantityController::class, 'store'])->name('ballq.store');

});

require __DIR__.'/auth.php';
