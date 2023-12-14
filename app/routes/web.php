<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\UpdateController;
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

// Route vers la page d'accueil
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Route vers la page d'ajout d'un nouveau mot de passe
Route::get('/addPasswd', function () {
    return view('addPasswd');
})->name('addPasswd');

// Route vers la page de création d'une nouvelle team
Route::get('/addTeam', function () {
    return view('addTeam');
})->name('addTeam');



// Route avec appel de controlleur #Méthode C.R.U.D

// ----- CREATE -----

// Route 
Route::post('/newPasswd', [CreateController::class, 'addPasswd'])->name('newPasswd');

// Route 
Route::post('/newTeam', [CreateController::class, 'addTeam'])->name('newTeam');



// ----- READ -----

// Route : la page récupère tous les mdp de l'utilisateur puis redirige vers une page qui les listes
Route::get('/passwdList', [ReadController::class, 'foundPasswd'])->name('passwdList');

// Route : le controlleur récupère toutes les infos du mdp à modifier puis redirige vers la page qui permet de rentrer le new mdp
Route::get('/passwdToUpdate/{id}', [ReadController::class, 'passwdToUpdate'])->name('passwdToUpdate');

// Route : la page liste les team auxquelles l'utilisateur appartient
Route::get('/teamList', [ReadController::class, 'foundTeams'])->name('teamList');

// Route : la page liste les membres d'une team
Route::get('/teamUsersList/{idTeam}', [ReadController::class, 'foundTeamUsers'])->name('teamUsersList');

// Route : la page affiche les utilisateurs portant le nom recherché
Route::post('/addUser/{idTeam}', [ReadController::class, 'foundUser'])->name('addUser');



// ----- UPDATE -----

// Route : le controlleur modifie le mdp et redirige sur la liste des mdp de l'utilisateur
Route::post('/updatePasswd/{id}', [UpdateController::class, 'changePasswd'])->name('updatePasswd');

// Route : le controlleur modifie la team en ajoutant un membre et redirige sur la liste des utilisateur présent dans la team
Route::post('addUserToTeam/{idUser}/{idTeam}', [UpdateController::class, 'addUsertoTeam'])->name('addUserToTeam');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';