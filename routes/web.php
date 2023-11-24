<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/*
|-----------------------
| 利用者側
|-----------------------
|
*/Route::prefix('user') // 頭に contacts をつける
 //->middleware(['auth']) // 認証
 ->name('contracts') // ルート名
 ->controller(ContractController::class) // コントローラ指定(laravel9から)
 ->group(function(){ // グループ化
    Route::get('/contracts', 'index')->name('user.contracts'); // 名前つきルート
    Route::get('/contracts/create', 'create')->name('user.contracts.create');
});

//Route::get('user/contracts', [ContractController::class, 'index'])->name('user.contracts');


/*
|-----------------------
| 運転者側
|-----------------------
|
*/


/*
|-----------------------
| 管理者側
|-----------------------
|
*/


require __DIR__.'/auth.php';
