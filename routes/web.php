<?php

use App\Http\Controllers\Admin\CourierAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementUserAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\PaketAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\RewardAdminController;
use App\Http\Controllers\Api\AlamatController;
use App\Http\Controllers\Authentication\AuthAdminController;
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

//Authentication 
Route::get('/', [AuthAdminController::class, 'showLoginForm']);
Route::post('/postlogin', [AuthAdminController::class, 'login']);
Route::get('/logout', [AuthAdminController::class, 'logout']);
Route::get('/register', [AuthAdminController::class, 'showRegisterForm']);
Route::post('/createregister', [AuthAdminController::class, 'createRegister']);

Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['role:superadmin'])->prefix('admin')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'showDashboard']);

        // Produk
        Route::get('/product', [ProductAdminController::class, 'getProduct']);
        Route::post('/product/create', [ProductAdminController::class, 'createProduct']);
        Route::get('/product-byid/{id}', [ProductAdminController::class, 'getProductById']);
        Route::put('/product/update/{id}', [ProductAdminController::class, 'updateProduct']);
        Route::delete('/product/delete/{id}', [ProductAdminController::class, 'deleteProduct']);

        // Paket
        Route::get('/paket', [PaketAdminController::class, 'getPaket']);
        Route::post('/paket/create', [PaketAdminController::class, 'createPaket']);
        Route::get('/paket-byid/{id}', [PaketAdminController::class, 'getPaketById']);
        Route::put('/paket/update/{id}', [PaketAdminController::class, 'updatePaket']);
        Route::delete('/paket/delete/{id}', [PaketAdminController::class, 'deletePaket']);

        // Courier
        Route::get('/courier', [CourierAdminController::class, 'getCourier']);
        Route::post('/courier/create', [CourierAdminController::class, 'createCourier']);
        Route::get('/courier-byid/{id}', [CourierAdminController::class, 'getCourierById']);
        Route::put('/courier/update/{id}', [CourierAdminController::class, 'updateCourier']);
        Route::delete('/courier/delete/{id}', [CourierAdminController::class, 'deleteCourier']);

        // Management User
        Route::get('/management-user', [ManagementUserAdminController::class, 'getUser']);
        Route::post('/management-user/create', [ManagementUserAdminController::class, 'createUser']);
        Route::get('/management-user-byid/{id}', [ManagementUserAdminController::class, 'getUserById']);
        Route::put('/management-user/update/{id}', [ManagementUserAdminController::class, 'updateUser']);
        Route::delete('/management-user/delete/{id}', [ManagementUserAdminController::class, 'deleteUser']);
        //Ubah Password User
        Route::post('/management-user/change-password', [ManagementUserAdminController::class, 'changePasswordUser']);
        // Generate Referral
        Route::get('/management-user/generate-code', [ManagementUserAdminController::class, 'generateReferral']);

        // Reward
        Route::get('/reward', [RewardAdminController::class, 'getReward']);
        Route::post('/reward/create', [RewardAdminController::class, 'createReward']);
        Route::get('/reward-byid/{id}', [RewardAdminController::class, 'getRewardById']);
        Route::put('/reward/update/{id}', [RewardAdminController::class, 'updateReward']);
        Route::delete('/reward/delete/{id}', [RewardAdminController::class, 'deleteReward']);

        // Order
        Route::get('/order', [OrderAdminController::class, 'getOrder']);
        Route::post('/order/create', [OrderAdminController::class, 'createOrder']);
        Route::get('/order-byid/{id}', [OrderAdminController::class, 'getOrderById']);
        Route::put('/order/update/{id}', [OrderAdminController::class, 'updateOrder']);
        Route::delete('/order/delete/{id}', [OrderAdminController::class, 'deleteOrder']);
    });
});



//Forgot & Reset Password
// Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'PostForgotPassword'])->name('forgot.password.post');
// Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password');
// Route::post('/reset-password', [ForgotPasswordController::class, 'PostResetPassword'])->name('reset.password.post');
