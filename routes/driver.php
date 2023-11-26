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

Route::get('/', function () {
    return view('driver.welcome');
});

Route::get('/dashboard', function () {
    return view('driver.dashboard');
})->middleware(['auth:drivers'])->name('dashboard');


/*
|-----------------------
| 運転手側
|-----------------------
|
*/
// Route::prefix('driver') // 頭に contacts をつける
//  //->middleware(['auth:users']) // 認証
//  ->name('contracts') // ルート名
//  ->controller(ContractController::class) // コントローラ指定(laravel9から)
//  ->group(function(){ // グループ化
//     Route::get('/contracts', 'index')->name('driver.contracts'); // 名前つきルート
//     Route::get('/contracts/create', 'create')->name('driver.contracts.create');
// });

//Route::get('user/contracts', [ContractController::class, 'index'])->name('user.contracts');




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

