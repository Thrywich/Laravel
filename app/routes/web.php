<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PostController;
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
    return view('landing');
})->name('landing');

Route::get('/newPassWord', function () {
    return view('newPassWord');
})->name('newPassWord');

Route::get('/addTeam', function () {
    return view('addTeam');
})->name('addTeam');


Route::post('/form', [PostController::class, 'store'])->name('form');

Route::post('/update/{pwd}/{id}', [PostController::class, 'change'])->name('update');

Route::post('/newTeam', [PostController::class, 'addTeam'])->name('newTeam');



Route::get('/passwdList', [DataController::class, 'found'])->name('passwdList');

Route::get('/updatePasswd/{id}', [DataController::class, 'updatePasswd'])->name('updatePasswd');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';