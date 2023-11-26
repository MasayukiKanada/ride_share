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
});

//Route::get('user/contracts', [ContractController::class, 'index'])->name('user.contracts');


require __DIR__.'/auth.php';
