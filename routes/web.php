<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [BandController::class, 'getAllBands'])->name('home');


//Rotas USERS:

Route::get('users', [UserController::class, 'users'])->name('users.all');
Route::get('/create-user', [UserController::class, 'createUser'])->name('users.create');
Route::post('/store-user', [UserController::class, 'storeUser'])->name('store.user');
Route::get('/users-view', [UserController::class, 'usersView']);
Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboard'); //só entra nessa rota se o usuario estiver autenticado

//Rotas BANDS:

Route::get('/create-band', [BandController::class, 'createBand'])->name('createBand');
Route::post('/store-band', [BandController::class, 'storeBand'])->name('store.band');
Route::get('bands/{id}', [BandController::class, 'viewBand'])->name('band.view');

//Rotas ALBUNS:

Route::get('/create-album', [AlbumController::class, 'createAlbum'])->name('createAlbum');
Route::post('/store-album', [AlbumController::class, 'storeAlbum'])->name('store.album');


