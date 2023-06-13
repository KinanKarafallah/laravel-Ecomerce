<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarkasReadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Models\product;


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

// Show Register/Create Form


// Create New User


// Log User Out


// Show Login Form
Route::group(['middleware' => 'auth'], function () {
    // profile routes

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    // products routes
    Route::resource('/products',ProductController::class);
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/myproducts', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::get('/products/show/{product}', [ProductController::class, 'show']);

    // cart routes
    Route::get('/mycart', [CartController::class, 'show_cart']);
    Route::post('/mycart/updateQty/{item}', [CartController::class, 'updateQty']);
    Route::delete('/item/{item}', [CartController::class, 'delete_cart_product']);
    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
    Route::get('/checkout/succsess',[CartController::class,'succsess'])->name('checkout.success');
    Route::get('/checkout/failure',[CartController::class,'failure'])->name('checkout.failure');

    //order
    Route::get('/myorders',[OrderController::class,'index'])->name('orders.index');
    Route::get('/myorder/{id}',[OrderController::class,'showOrderProduct'])->name('orders.show');


    //notification
    Route::get('ReadNotification/{id}',MarkasReadController::class)->name('ReadNotification');


});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/users', [RegisterController::class, 'store'])->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	  Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
    Route::get('/redirect', [LoginController::class, 'redirectToProvider'])->name('redirect');
    Route::any('/callback', [LoginController::class, 'handleProviderCallback'])->name('callback');
    

    // reset password
    Route::get('/forgot-password', [PasswordResetController::class,'index'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class,'sendEmailNotification'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class,'resetPasswordToken'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class,'resetPassword'])->name('password.update');
    
    
    
});

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::view('/about', 'users.about')->name('about');


Route::prefix('admin')->group(function(){
  Route::view('dashboard','admin.dashboard');
});
Route::any('/addcart',[CartController::class,'add_to_cart'])->name('addCart');





