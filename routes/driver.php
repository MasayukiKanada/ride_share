<?php

use App\Http\Controllers\Driver\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Driver\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Driver\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Driver\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Driver\Auth\NewPasswordController;
use App\Http\Controllers\Driver\Auth\PasswordResetLinkController;
use App\Http\Controllers\Driver\Auth\RegisteredUserController;
use App\Http\Controllers\Driver\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverOfferController;

/*
|-----------------------
| 運転手側
|-----------------------
|
*/

// Route::get('/', function () {
//     return view('driver.welcome');
// });
Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('driver.dashboard');
})->middleware(['auth:drivers'])->name('dashboard');

/*---------ドライバー情報管理-----------*/
Route::prefix('driver') // 頭にdriverをつける
 ->middleware(['auth:drivers']) // 認証
 //->name('driver') // ルート名
 ->controller(DriverController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/show', 'show')->name('show'); // 名前つきルート
    Route::get('/edit', 'edit')->name('edit');
    Route::post('/confirm', 'confirm')->name('confirm');
    Route::post('/update', 'update')->name('update');
    Route::post('/complete', 'destroy')->name('destroy');
});

/*---------オファー管理-----------*/
Route:://prefix('driver') // 頭に driverをつける
 middleware(['auth:drivers']) // 認証
 ->name('offers.') // ルート名
 ->controller(DriverOfferController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/offers', 'index')->name('index'); // 名前つきルート
    Route::get('/offers/show/{id}', 'show')->name('show');
    Route::get('/offers/create', 'create')->name('create');
    Route::post('/offers/confirm', 'confirm')->name('confirm');
    Route::post('/offers/complete', 'store')->name('store');
});

/*---------成約済オファー管理-----------*/
Route:://prefix('driver') // 頭に driverをつける
 middleware(['auth:drivers']) // 認証
 ->name('contracts.') // ルート名
 ->controller(ContractController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/contracts', 'DriverIndex')->name('index'); // 名前つきルート
    Route::get('/contracts/show/{id}', 'DriverShow')->name('show');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:drivers')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

