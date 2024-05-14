<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [BandController::class, 'getAllBands']);


//Rotas USERS:

Route::get('users', [UserController::class, 'users'])->name('users.all');
Route::get('/create-user', [UserController::class, 'createUser'])->name('users.create');
Route::post('/store-user', [UserController::class, 'storeUser'])->name('store.user');
Route::get('/users-view', [UserController::class, 'usersView']);
Route::get('/dashboard', [DashboardController::class, 'dashboardPage']); //só entra nessa rota se o usuario estiver autenticado


//Rotas BANDS:
Route::get('/create-band', [BandController::class, 'createBand']);
