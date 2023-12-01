<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverOfferController;
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
 ->name('contracts.') // ルート名
 ->controller(ContractController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/contracts', 'index')->name('index'); // 名前つきルート
    Route::get('/contracts/{id}', 'show')->name('show'); // 名前つきルート
    Route::get('/contracts/create', 'create')->name('create');
    Route::post('/contracts/select', 'select')->name('select');
    Route::post('/contracts/confirm', 'confirm')->name('confirm');
    Route::post('/contracts/complete', 'store')->name('store');
});

Route::prefix('user') // 頭に user をつける
 ->middleware(['auth:users']) // 認証
 //->name('user') // ルート名
 ->controller(UserController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/show', 'show')->name('show'); // 名前つきルート
    Route::get('/edit', 'edit')->name('edit');
    Route::post('/complete', 'update')->name('update');
    Route::post('/complete', 'destroy')->name('destroy');
});

//Route::get('user/contracts', [ContractController::class, 'index'])->name('user.contracts');


require __DIR__.'/auth.php';
