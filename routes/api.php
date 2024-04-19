<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeCotroller;
use App\Http\Controllers\RestaurantController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
#php artisan make:resource Model //ceci va créé une resource en referant a ce model et dans ce resource on peut definir les collections qu'on veut récuperer http/resource
#Api\\ControllerApi

Route::get('/', [HomeCotroller::class, 'HomeApi']);

Route::get('/menu', [RestaurantController::class, 'MenuApi']);