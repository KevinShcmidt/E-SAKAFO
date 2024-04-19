<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeCotroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;

use App\Http\Controllers\RestaurantController;

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

Route::get('/', [HomeCotroller::class, 'Home'])->name('home');

Route::get('/login', [HomeCotroller::class, 'LogIn'])->name('login');
Route::get('/delProd/{id}', [PanierController::class, 'SupprP'])->name('retire');
Route::get('/logout', [HomeCotroller::class, 'LogOUT'])->name('logout');
Route::post('/login', [HomeCotroller::class, 'Authentification']);

Route::get('/registre', [HomeCotroller::class, 'Registre'])->name('registre');
Route::post('/registre', [HomeCotroller::class, 'StoreUser']);

Route::prefix('/restaurant')->name('resto.')->group(function (){
    Route::get('/{id}', [RestaurantController::class, 'Index'])->name('index');
    Route::middleware('auth')->post('/{id}', [PanierController::class, 'Store'])->name('panierStore');
});
Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/', [AdminController::class, 'Index'])->name('admin');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::get('/upgrade/{id}', [AdminController::class, 'IndexUpdate'])->name('update');
    Route::patch('/upgrade/{id}', [AdminController::class, 'Update'])->name('restoUpdate');
    Route::get('/delete/{id}', [AdminController::class, 'Delete'])->name('delete');
    Route::get('/{slug}-{id}/menu', [AdminController::class, 'Menu'])->name('menu');
    Route::post('/{slug}-{id}/menu', [AdminController::class, 'storeMenu'])->name('menu');
    Route::get('/menu/{id}', [AdminController::class, 'DelMenu'])->name('delMenu');
    Route::get('/menu/update/{id}', [AdminController::class, 'updateMenuIndex'])->name('updateMenu');
    Route::patch('/menu/update/{id}', [AdminController::class, 'updateMenu']);
    Route::get('/categorie', [AdminController::class, 'IndexCategorie'])->name('categorie');
    Route::post('/categorie', [AdminController::class, 'PostCategorie']);
    Route::get('/delCat/{id}', [AdminController::class, 'delCategorie'])->name('delCat');
});
Route::middleware('auth')->group(function (){
    Route::get('/panier', [PanierController::class, 'Index'])->name('panier');
});

