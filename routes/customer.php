<?php


use App\Http\Controllers\Auth\Customer\CustomerController;
use App\Http\Controllers\Auth\Customer\OrdersController;
use App\Http\Controllers\Auth\Customer\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Customer\WishlistController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\CheckOutController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('customerLogin');

Route::group(['middleware' => 'customer'], function () {
// Customer Dashboard

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order?}', [OrdersController::class, 'show'])->name('orders.show');

    Route::get('addmoney/stripe', [CheckOutController::class, 'paymentStripe'])->name('checkout.stripe');
    Route::any('/checkout/store/{order?}',[CheckOutController::class, 'store'])->name('checkout.store');


    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::any('profile/{id?}', [ProfileController::class, 'update'])->name('update');
    Route::any('remove/{id?}', [CustomerController::class, 'destroy'])->name('destroy');

    Route::get('/address', [CustomerController::class, 'address'])->name('address');
    Route::any('/address/{id?}', [CustomerController::class, 'update'])->name('addressUpdate');

//    Route::get('/home', [LoginController::class, 'showLoginForm'])->name('home');

});
