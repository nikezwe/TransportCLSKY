<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AnnoncesController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\ContactsController;

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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonce');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/membres', [MembreController::class, 'index'])->name('membre');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', ServicesController::class);
    Route::resource('annonces', AnnoncesController::class);
    Route::resource('team', TeamController::class);
});
