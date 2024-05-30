<?php

use App\Http\Controllers\Admin\CourierAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GambarBannerAdminController;
use App\Http\Controllers\Admin\InfoBonusAdminController;
use App\Http\Controllers\Admin\ManagementUserAdminController;
use App\Http\Controllers\Admin\MitraAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\PaketAdminController;
use App\Http\Controllers\Admin\PilihCepatAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\RewardAdminController;
use App\Http\Controllers\Admin\TargetBonusAdminController;
use App\Http\Controllers\Admin\WithdrawBalanceAdminController;
use App\Http\Controllers\Admin\WithdrawPointAdminController;
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

    // Gambar Banner Carousel
    Route::get('/gambar-banner-carousel', [GambarBannerAdminController::class, 'getGambarBannerCarousel']);

    // Gambar Informasi Banner
    Route::get('/gambar-informasi-banner', [GambarBannerAdminController::class, 'getGambarBannerInformasi']);

    // Courier
    Route::get('/courier', [CourierAdminController::class, 'getCourier']);
    Route::get('/courier/table', [CourierAdminController::class, 'getCouriers']);
    Route::post('/courier/create', [CourierAdminController::class, 'createCourier']);
    Route::get('/courier-byid/{id}', [CourierAdminController::class, 'getCourierById']);
    Route::put('/courier/update/{id}', [CourierAdminController::class, 'updateCourier']);
    Route::delete('/courier/delete/{id}', [CourierAdminController::class, 'deleteCourier']);

    // Info
    Route::get('/info', [InfoBonusAdminController::class, 'getInfo']);
    Route::get('/info/table', [InfoBonusAdminController::class, 'getInfo']);
    Route::post('/info/create', [InfoBonusAdminController::class, 'createInfo']);
    Route::get('/info-byid/{id}', [InfoBonusAdminController::class, 'getInfoById']);
    Route::put('/info/update/{id}', [InfoBonusAdminController::class, 'updateInfo']);
    Route::delete('/info/delete/{id}', [InfoBonusAdminController::class, 'deleteInfo']);

    // Target
    Route::get('/target', [TargetBonusAdminController::class, 'getTarget']);
    Route::get('/target/table', [TargetBonusAdminController::class, 'getTarget']);
    Route::post('/target/create', [TargetBonusAdminController::class, 'createTarget']);
    Route::get('/target-byid/{id}', [TargetBonusAdminController::class, 'getTargetById']);
    Route::put('/target/update/{id}', [TargetBonusAdminController::class, 'updateTarget']);
    Route::delete('/target/delete/{id}', [TargetBonusAdminController::class, 'deleteTarget']);

    // Pilihan Cepat
    Route::get('/pilihan-cepat', [PilihCepatAdminController::class, 'getPilihanCepat']);
    Route::get('/pilihan-cepat/table', [PilihCepatAdminController::class, 'getPilihanCepat']);
    Route::post('/pilihan-cepat/create', [PilihCepatAdminController::class, 'createPilihanCepat']);
    Route::get('/pilihan-cepat-byid/{id}', [PilihCepatAdminController::class, 'getPilihanCepatById']);
    Route::put('/pilihan-cepat/update/{id}', [PilihCepatAdminController::class, 'updatePilihanCepat']);
    Route::delete('/pilihan-cepat/delete/{id}', [PilihCepatAdminController::class, 'deletePilihanCepat']);

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

    // Mitra
    Route::get('/mitra', [MitraAdminController::class, 'getMitra']);

    // Withdraw Balance
    Route::get('/withdraw-balance', [WithdrawBalanceAdminController::class, 'getWithdrawBalance']);
    Route::post('/withdraw-balance/create', [WithdrawBalanceAdminController::class, 'createWithdrawBalance']);
    Route::get('/withdraw-balance-byid/{id}', [WithdrawBalanceAdminController::class, 'getWithdrawBalanceById']);
    Route::put('/withdraw-balance/update/{id}', [WithdrawBalanceAdminController::class, 'updateWithdrawBalance']);
    Route::put('/withdraw-balance-status/update/{id}', [WithdrawBalanceAdminController::class, 'updateWithdrawBalanceStatus']);
    Route::delete('/withdraw-balance/delete/{id}', [WithdrawBalanceAdminController::class, 'deleteWithdrawBalance']);

    // Withdraw Point
    Route::get('/withdraw-point', [WithdrawPointAdminController::class, 'getWithdrawPoint']);
    Route::post('/withdraw-point/create', [WithdrawPointAdminController::class, 'createithdrawPoint']);
    Route::get('/withdraw-point-byid/{id}', [WithdrawPointAdminController::class, 'getithdrawPointById']);
    Route::put('/withdraw-point/update/{id}', [WithdrawPointAdminController::class, 'updateithdrawPoint']);
    Route::put('/withdraw-point-status/update/{id}', [WithdrawPointAdminController::class, 'updateWithdrawPointStatus']);
    Route::delete('/withdraw-point/delete/{id}', [WithdrawPointAdminController::class, 'deleteithdrawPoint']);
});




//Forgot & Reset Password
// Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'PostForgotPassword'])->name('forgot.password.post');
// Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password');
// Route::post('/reset-password', [ForgotPasswordController::class, 'PostResetPassword'])->name('reset.password.post');
