<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

/*
|-----------------------
| 利用者側
|-----------------------
|
*/

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');


Route::prefix('user') // 頭に contacts をつける
 ->middleware(['auth:users']) // 認証
 ->name('contracts') // ルート名
 ->controller(ContractController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/contracts', 'index')->name('user.contracts'); // 名前つきルート
    Route::get('/contracts/create', 'create')->name('user.contracts.create');
    Route::post('/contracts/select', 'select')->name('user.contracts.select');
    Route::post('/contracts/confirm', 'confirm')->name('user.contracts.confirm');
    Route::post('/contracts/complete', 'store')->name('user.contracts.store');
});

Route::prefix('user') // 頭に user をつける
 ->middleware(['auth:users']) // 認証
 ->name('user') // ルート名
 ->controller(UserController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/user', 'show')->name('user'); // 名前つきルート
    Route::get('/user/edit', 'edit')->name('user.edit');
    Route::post('/user/complete', 'update')->name('user.update');
    Route::post('/user/complete', 'destroy')->name('user.destroy');
});

//Route::get('user/contracts', [ContractController::class, 'index'])->name('user.contracts');


require __DIR__.'/auth.php';
