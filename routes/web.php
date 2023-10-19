<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\ReservationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');

    Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
});
Route::get('/livres', [LivreController::class,'index'])->name('livres.index');
Route::get('/livres', [ReservationController::class,'index'])->name('livres.index');

Route::get('/connexion', [MembreController::class,'login'])->name('connexion');
Route::post('/connexion', [MembreController::class,'authenticate'])->name('membre.authenticate');

Route::get('/inscription', [MembreController::class, 'inscriptionForm'])->name('inscription');
Route::post('/inscription', [MembreController::class, 'inscrire'])->name('inscrire');


Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');

Route::post('/livres/reserver/{id}', [LivreController::class, 'reserver'])->name('livres.reserver');

Route::get('/livres/{id}/edit', [LivreController::class,'edit'])->name('livres.edit');
Route::put('/livres/{id}', [LivreController::class,'update'])->name('livres.update');

Route::delete('/livres/{id}', [LivreController::class,'destroy'])->name('livres.destroy');

Route::get('/deconnexion', [MembreController::class, 'logout'])->name('deconnexion');

Route::get('/livres/rendre/{id}', [ReservationController::class, 'rendreLivre'])->name('livres.rendre');

Route::post('/livres/recherche', [LivreController::class, 'rechercher'])->name('livres.rechercher');
