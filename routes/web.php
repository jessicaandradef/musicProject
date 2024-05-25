<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Rotas iniciais:

Route::get('/', [BandController::class, 'getAllBands'])->name('home');
Route::get('/home', [BandController::class, 'getAllBands'])->name('home');

//Rotas USERS:

Route::get('users', [UserController::class, 'users'])->name('users.all');
Route::get('/create-user', [UserController::class, 'createUser'])->name('users.create');
Route::post('/store-user', [UserController::class, 'storeUser'])->name('store.user')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboard'); //só entra nessa rota se o usuario estiver autenticado

//Rotas BANDS:

Route::get('/create-band', [BandController::class, 'createBand'])->name('createBand')->middleware('auth');
Route::post('/store-band', [BandController::class, 'storeBand'])->name('store.band')->middleware('auth');
Route::get('bands/{id}', [BandController::class, 'viewBand'])->name('band.view');
Route::get('delete-band/{id}', [BandController::class, 'deleteBand'])->name('delete.band')->middleware('auth');
Route::match(['get', 'post'],'edit-band/{id}', [BandController::class, 'editBand'])->name('edit.band')->middleware('auth');

//Rotas ALBUNS:

Route::get('/create-album', [AlbumController::class, 'createAlbum'])->name('createAlbum')->middleware('auth');
Route::post('/store-album', [AlbumController::class, 'storeAlbum'])->name('store.album')->middleware('auth');
Route::match(['get', 'post'],'edit-album/{id}', [AlbumController::class, 'editAlbum'])->name('edit.album')->middleware('auth');


