<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Merchant\Menu\MenuController;

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

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');

Route::middleware(['auth'])->group(function(){
    Route::get('/', [AuthController::class, 'homeView'])->name('home');
});


Route::middleware(['auth', 'checkRole:1'])->group(function(){

    Route::prefix('merchant')->group(function(){

        Route::prefix('menu')->group(function () {
            Route::get('/', [MenuController::class, 'getMenu'])->name('menu');
            Route::get('/add-form', [MenuController::class, 'addMenuView'])->name('add.menu-form');
            Route::post('/add', [MenuController::class, 'addMenu'])->name('menu.add');
            // Route::post('/add', [MenuController::class, 'addMenu'])->name('menu.add');
            // Route::put('/update/{id}', [MenuController::class, 'updateMenu'])->name('menu.update');
            // Route::delete('/delete/{id}', [MenuController::class, 'deleteMenu'])->name('menu.delete');
        });
    });

});

Route::prefix('auth')->group(function(){
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

