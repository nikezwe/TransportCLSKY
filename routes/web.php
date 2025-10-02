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
use Illuminate\Support\Facades\Auth;

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
Route::get('/annonce',[AnnonceController::class, 'index'])->name('annonce');
Route::get('/annonce/{id}', [AnnonceController::class, 'show'])->name('annonce.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/membres', [MembreController::class, 'index'])->name('membre');

// Routes d'administration
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', ServicesController::class)->except(['show']);

    Route::resource('annonces', AnnoncesController::class)->except(['show']);
    
    Route::resource('membres', TeamController::class)->except(['show']);
    
    // Route::get('contacts', [ContactsController::class, 'index'])->name('contacts.index');
    // Route::get('contacts/{contact}', [ContactsController::class, 'show'])->name('contacts.show');
    // Route::delete('contacts/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');
});


// Route de déconnexion
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
