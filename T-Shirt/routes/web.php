<?php

use App\Http\Controllers\Admin\ClothesController;
use App\Http\Controllers\Admin\ColorController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\Users\SignupController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\User\MainUserController;
use \App\Http\Controllers\User\ProductUserController;
use \App\Http\Controllers\User\CartUserController;
use \App\Http\Controllers\User\DeliveryUserController;
use \App\Http\Controllers\User\CartegoryUserController;
use \App\Http\Controllers\User\InforController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\Admin\OrderController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\VoucherController;
use \App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\User\PaymentController;
use Monolog\Handler\RotatingFileHandler;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login', [LoginController::class, 'store']);
Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store'])->name('signup');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/home', [MainController::class, 'index'])->name('admin');

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::delete('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
        });

        #Clothes
        Route::prefix('clothes')->group(function () {
            Route::get('list', [ClothesController::class, 'index']);
            Route::get('add', [ClothesController::class, 'create']);
            Route::post('add', [ClothesController::class, 'store']);
            Route::delete('destroy/{id}', [ClothesController::class, 'destroy'])->name('clothes.destroy');
        });

        #Color
        Route::prefix('colors')->group(function () {
            Route::get('list', [ColorController::class, 'index']);
            Route::get('add', [ColorController::class, 'create']);
            Route::post('add', [ColorController::class, 'store']);
            Route::delete('destroy/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('list', [ProductController::class, 'index'])->name('product.list');
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store'])->name('UploadProduct.post');
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        });

        #Slider
        Route::prefix('Slider')->group(function () {
            Route::get('list', [SliderController::class, 'index']);
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store'])->name('UploadSlider.post');
        });

        #Order
        Route::prefix('orders')->group(function () {
            Route::get('list', [OrderController::class, 'index']);
            Route::patch('list/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
            Route::delete('destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
            Route::get('detail/{order}', [OrderController::class, 'show']);
            // Route::get('add', [SliderController::class, 'create']);
            // Route::post('add', [SliderController::class, 'store'])->name('UploadSlider.post');
        });

        #User       
        Route::prefix('users')->group(function () { 
            Route::get('list', [UserController::class, 'index']);
            Route::post('edit/{user}', [UserController::class, 'show'])->name('user.show');
            Route::post('edit/{user}', [UserController::class, 'update'])->name('user.update');
            // Route::get('detail/{order}', [OrderController::class, 'show']);
            // Route::get('add', [SliderController::class, 'create']);
            // Route::post('add', [SliderController::class, 'store'])->name('UploadSlider.post');
        });

        #Voucher 
        Route::prefix('vouchers')->group(function () { 
            Route::get('list', [VoucherController::class, 'index']);
            Route::get('/update-active-status', [VoucherController::class, 'updateActiveStatus']);
            Route::get('add', [VoucherController::class, 'create']);
            Route::post('add', [VoucherController::class, 'store'])->name('vouchers.post');
            Route::get('edit/{comment}', [VoucherController::class, 'show']);
            Route::post('edit/{comment}', [VoucherController::class, 'update']);
            Route::delete('destroy/{id}', [VoucherController::class, 'destroy'])->name('vouchers.destroy');
            // Route::post('edit/{user}', [UserController::class, 'show'])->name('user.show');
            // Route::post('edit/{user}', [UserController::class, 'update'])->name('user.update');
        });

        #Comment  
        Route::prefix('comments')->group(function () { 
            Route::get('list', [CommentController::class, 'index']);
            Route::delete('destroy/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
            // Route::post('edit/{user}', [UserController::class, 'show'])->name('user.show');
            // Route::post('edit/{user}', [UserController::class, 'update'])->name('user.update');
        });
    });
});


Route::get('/', [MainUserController::class, 'index'])->name('user');
Route::prefix('user')->group(function () {
    // Route::get('/product', [ProductUserController::class, 'index']);
    Route::get('product/content/{product}', [ProductUserController::class, 'show']);
    Route::get('cartegory/content/{menu_id}', [CartegoryUserController::class, 'show']);

    Route::post('product/content/{product}', [ProductUserController::class, 'store'])->name('UploadProduct_detail.post')->middleware('auth');
    Route::post('product/comment/{product}', [ProductUserController::class, 'comment'])->name('Product_comment.post')->middleware('auth');

    Route::get('cart/content', [CartUserController::class, 'index'])->name('cart.content')->middleware('auth');
    Route::delete('cart/destroy/{id}', [CartUserController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

    Route::get('delivery', [DeliveryUserController::class, 'index'])->name('delivery.content')->middleware('auth');
    Route::patch('delivery', [DeliveryUserController::class, 'index'])->name('apply.voucher')->middleware('auth');
    Route::post('delivery', [DeliveryUserController::class, 'store'])->name('delivery.post')->middleware('auth');

    Route::get('infor/content', [InforController::class, 'index'])->name('infor.content')->middleware('auth');
    Route::post('infor/content', [InforController::class, 'update'])->name('infor.post')->middleware('auth');
    Route::patch('infor/content', [InforController::class, 'password_update'])->name('password.update')->middleware('auth');
    Route::patch('infor/content/{id}', [InforController::class, 'order_cancel'])->name('order.cancel')->middleware('auth');
    Route::get('infor/detail/{order}', [InforController::class, 'show'])->middleware('auth');
    // Route::get('/cartegory', [CartegoryUserController::class, 'index']);

    Route::get('payment-result', [PaymentController::class, 'index']);
});

