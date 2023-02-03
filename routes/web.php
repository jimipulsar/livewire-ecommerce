<?php

use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\Admin\NewsletterController;
use App\Http\Controllers\Auth\Admin\ProductsController;
use App\Http\Controllers\Auth\Customer\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontEnd\BrandController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\CheckOutController;
use App\Http\Controllers\FrontEnd\CompareController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\NewsController;
use App\Http\Controllers\FrontEnd\SendMailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Controllers\HttpConnectionHandler;

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

Route::view('/', 'pages.index')->name('index');
//Route::any('/search',[FrontEndController::class, 'search'])->name('search');
//Route::any('/search-shop', [FrontEndController::class, 'searchShop'])->name('searchShop');
//Route::any('/product-shop', [FrontEndController::class, 'productShop'])->name('product.shop');
Route::get(__('routes.category'), [FrontEndController::class, 'mainCategory'])->name('mainCategory');
Route::get(__('routes.categoryID'), [FrontEndController::class, 'categoryPage'])->name('categoryPage');

Route::get(__('routes.searchCategory'), [FrontEndController::class, 'searchCategory'])->name('searchCategory');
Route::get(__('routes.about'), [FrontEndController::class, 'about'])->name('about');
Route::get(__('routes.brands'), [FrontEndController::class, 'brands'])->name('brands');
Route::get(__('routes.news'), [NewsController::class, 'news'])->name('news');
Route::get(__('routes.single'), [NewsController::class, 'single'])->name('single');

Route::view(__('routes.contacts'), 'pages.contacts')->name('contacts');
Route::get(__('routes.products'), [FrontEndController::class, 'show'])->name('shop.show');
Route::get(__('routes.shop'), [FrontEndController::class, 'shop'])->name('shop.index');
Route::view(__('routes.spare'), 'pages.spare-parts')->name('spare');

//Route::view(__('/filter'), 'pages.filter')->name('filter');
Route::post('livewire/message/{name}', [HttpConnectionHandler::class, '__invoke']);

Auth::routes();

Route::post('/login', [LoginController::class, 'login'])->name('customerLogin');
Route::post('/login', [LoginController::class, 'postLogin'])->name('customerLoginPost');

Route::any(__('routes.register'), [RegisterController::class, 'showRegistrationForm'])->name('registerCustom');
Route::post(__('routes.register'), [RegisterController::class, 'register'])->name('registerPOST');
Route::get('/add-to-wishlist/{id?}', [WishlistController::class, 'addToWishlist'])->name('addwishlist');
Route::get('/remove-wishlist/{product?}/{id?}', [WishlistController::class, 'removeWish'])->name('removewish');
Route::get(__('routes.addQuantity'),[CartController::class, 'addQuantity'])->name('addQuantity');
Route::get(__('routes.addCart'),[CartController::class, 'addToCart'])->name('addcart');
Route::get(__('routes.removeCart'),[CartController::class, 'removeToCart'])->name('removecart');
Route::get(__('routes.remove'),  [CartController::class, 'remove'])->name('remove');

Route::get(__('routes.addToCompare'),[CompareController::class, 'addToCompare'])->name('addToCompare');
Route::get(__('routes.removeToCompare'),[CompareController::class, 'removeToCompare'])->name('removeToCompare');
Route::get(__('routes.removeCompare'),  [CompareController::class, 'removeCompare'])->name('removeCompare');
Route::get(__('routes.compare'), [CompareController::class, 'compare'])->name('compare');

Route::get(env('APP_ADMIN_URL'),[AdminController::class, 'getLogin'])->name('adminLogin');
Route::post(env('APP_ADMIN_URL'), [AdminController::class, 'postLogin'])->name('adminLoginPost');

Route::view(__('routes.terms'), 'pages.conditions')->name('conditions');

Route::post('send/product-request', [SendMailController::class, 'sendProduct'])->name('sendProduct');

Route::post('send/contact/form', [SendMailController::class, 'sendmail'])->name('sent');
Route::get('send/status/{status}', [SendMailController::class, 'sendSuccess'])->name('success');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newRegistration');
//Route::any('/unsubscribe/{id?}', [NewsletterController::class, 'unsubscribe'])->name('subscribers.delete');

//Route::get('/home', [LoginController::class, 'showLoginForm'])->name('home');

Route::group(['middleware' => 'customer'], function () {
    Route::get('/home', [LoginController::class, 'showLoginForm'])->name('home');
    Route::get(__('routes.cart'), [CartController::class, 'cart'])->name('cart');
    Route::any('/checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('/cart/{product?}',  [CartController::class, 'store'])->name('cartCoupon.store');
    Route::delete('/cart/{product?}', [CartController::class, 'destroy'])->name('cartCoupon.destroy');

});

