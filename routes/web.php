<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SaleController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::resource('items', ItemController::class);
    Route::resource('members', MemberController::class);
    Route::get('/orders/order', [SaleController::class, 'order'])->name('orders.order');
    // Route::post('/orders/add-item', [SaleController::class, 'addItem'])->name('orders.addItem');
    // Route::post('/orders/remove-item/{itemId}', [SaleController::class, 'removeItem'])->name('orders.removeItem');
    // Route::post('/orders/remove-item/{id}', [SaleController::class, 'removeItem'])->name('orders.removeItem');
    Route::get('/orders', [SaleController::class, 'order'])->name('orders.index');
    Route::post('/orders/add', [SaleController::class, 'addItem'])->name('orders.addItem');
    // Route::delete('/orders/remove-item/{itemId}', [SaleController::class, 'destroy'])->name('orders.removeItem');
    Route::delete('orders/remove-item/{itemId}', [SaleController::class, 'removeItem'])->name('orders.removeItem');
    Route::post('/orders/pay', [SaleController::class, 'pay'])->name('orders.pay');
    Route::post('/orders/check-member', [SaleController::class, 'checkMember'])->name('orders.checkMember');
    
});

