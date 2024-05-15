<?php

use App\Http\Controllers\Api\AlamatController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\CheckoutContoller;
use App\Http\Controllers\Api\NotifController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\Api\UserDetailController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/notifikasi/{user_id}', [NotifController::class, 'notifikasi']);
Route::get('/notifikasi/isread/{user_id}', [NotifController::class, 'notifikasiIsRead']);
Route::put('/notifikasi/updateisread', [NotifController::class, 'updateIsRead']);
