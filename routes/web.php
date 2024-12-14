<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Home Controller

Route::get('/', [HomeController::class, 'home'])->name('dashboard');
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('dashboardadmin')->middleware(['auth','admin']);

//Admin Controller
Route::get('/view/cat', [AdminController::class, 'mostra_categorie'])->name('mostra_categorie');
Route::post('/add/cat', [AdminController::class, 'add_cat'])->name('add_cat');
Route::post('/update-category/{id}', [AdminController::class, 'update'])->name('update.category');
Route::delete('/delete/category/{id}', [AdminController::class, 'destroy']);

Route::get('/view/prod', [AdminController::class, 'mostra_prodotti'])->name('mostra_prodotti');







//video 12
//finisci l'inserimento dei prodotti.
