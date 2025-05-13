<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Route pour la page d'accueil après connexion
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Routes CRUD pour les produits
    Route::resource('produits', ProduitController::class)->except(['show']);
    
    // Route supplémentaire pour afficher un produit (si nécessaire)
    Route::get('produits/{produit}', [ProduitController::class, 'show'])
         ->name('produits.show')
         ->middleware('can:view,produit');

    // Route pour la recherche de produits
    Route::get('produits/search', [ProduitController::class, 'search'])
         ->name('produits.search');
});

// Route par défaut redirigeant vers la liste des produits
Route::redirect('/', '/produits');