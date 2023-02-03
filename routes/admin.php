<?php


use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\Auth\Admin\AdminCustomerController;
use App\Http\Controllers\Auth\Admin\AdminOrderController;
use App\Http\Controllers\Auth\Admin\AttributeController;
use App\Http\Controllers\Auth\Admin\BrandController;
use App\Http\Controllers\Auth\Admin\CategoryController;
use App\Http\Controllers\Auth\Admin\CouponController;
use App\Http\Controllers\Auth\Admin\ImportExcelController;
use App\Http\Controllers\Auth\Admin\LogActivityController;
use App\Http\Controllers\Auth\Admin\NewsletterController;
use App\Http\Controllers\Auth\Admin\ProductsController;
use App\Http\Controllers\Auth\Admin\ProfileAdminController;
use App\Http\Controllers\Auth\Admin\SliderController;
use App\Http\Controllers\Auth\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], env('APP_ADMIN_URL'), [AdminController::class, 'login'])->name('adminlogin');
//Route::any('products/destroy/{product?}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::group(['middleware' => 'admin'], function () {
    // Admin dashboard
    Route::resource('customers', AdminCustomerController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::get('/brands/duplicate/{id}',[BrandController::class, 'duplicate'])->name('brands.duplicate');
    Route::get('/products/duplicate/{id}',[ProductsController::class, 'duplicate'])->name('products.duplicate');
//    Route::delete('/remove/{product?}',[ProductsController::class, 'remove2'])->name('remove.pro');
//    Route::delete('/remove2/{product?}',[ProductsController::class, 'remove3'])->name('remove.pro3');
    Route::any('/products/remove1/{id}/{product?}', [ProductsController::class,'remove1'])->name('remove1');
    Route::any('/products/remove2/{id}/{product?}', [ProductsController::class,'remove2'])->name('remove2');
    Route::any('/products/remove3/{id}/{product?}', [ProductsController::class,'remove3'])->name('remove3');
    Route::any('/products/remove-attachment/{id}/{product?}', [ProductsController::class,'removeAttachment'])->name('removeAttachment');

    Route::view('/forms', 'auth.admin.forms')->name('forms');
    Route::get('/admin-orders', [AdminOrderController::class, 'index'])->name('adminOrders.index');
    Route::get('/admin-orders/{order?}/{id?}', [AdminOrderController::class, 'show'])->name('adminOrders.show');
    Route::post('/admin-orders/{order?}', [AdminOrderController::class, 'update'])->name('adminOrders.update');
    Route::get('/admin-orders/{order?}/edit', [AdminOrderController::class, 'edit'])->name('adminOrders.edit');
    Route::any('/cancel-order/{order?}/{id?}', [AdminOrderController::class, 'cancelOrder'])->name('cancelOrder');

    Route::any('/search', [AdminController::class, 'searchOrder'])->name('searchOrder');
    Route::any('/search-product', [ProductsController::class, 'searchProduct'])->name('searchProduct');

    Route::any('/logs', [LogActivityController::class, 'index'])->name('logActivity');
    Route::any('/admin-logs', [LogActivityController::class, 'admin'])->name('AdminLogActivity');
    Route::resource('sliders', SliderController::class);

    Route::get('profile', [ProfileAdminController::class, 'index'])->name('profileAdmin');
    Route::any('profile/{id?}', [ProfileAdminController::class, 'update'])->name('updateAdmin');

    Route::get('file-import-export', [ImportExcelController::class, 'fileImportExport'])->name('importData');
    Route::post('file-import', [ImportExcelController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [ImportExcelController::class, 'fileExport'])->name('file-export');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('shipments', [AdminController::class, 'shipments'])->name('shipments');

    Route::get('subscribers', [NewsletterController::class, 'index'])->name('subscribers.index');
    Route::any('subscribers/{subscribers?}', [NewsletterController::class, 'destroy'])->name('subscribers.destroy');

    // logout
    Route::post('logout', [AdminController::class, 'adminLogout'])->name('adminLogout');

});
