<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FAQController;

use App\Http\Controllers\VarietyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillboardController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SignatureController;

use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Auth::routes();


// Admin Login
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [LoginController::class, 'adminLogin']);


// Writer Login
Route::get('/login/writer', [LoginController::class, 'showWriterLoginForm']);
Route::post('/login/writer', [LoginController::class, 'writerLogin']);


// Admin Register
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::post('/register/admin', [RegisterController::class, 'registerAdmin']);


// Writer Register
Route::get('/register/writer', [RegisterController::class, 'showWriterRegisterForm']);
Route::post('/register/writer', [RegisterController::class, 'registerWriter']);


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

// User frontend homepage
Route::get('/', [IndexController::class, 'index'])
    ->name('frontend.home');


// Admin Dashboard
Route::view('/admin', 'admin.index')
    ->middleware('auth:admin')
    ->name('admin.dashboard');


// Writer Dashboard
Route::view('/writer', 'user.index')
    ->middleware('auth:writer');


// Home
Route::get('/home', [IndexController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    $redirect = '/';

    if (Auth::guard('admin')->check()) {

        Auth::guard('admin')->logout();

        $redirect = '/home';

    } elseif (Auth::guard('writer')->check()) {

        Auth::guard('writer')->logout();

        $redirect = '/';

    } elseif (Auth::guard('web')->check()) {

        Auth::guard('web')->logout();

        $redirect = '/';
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect($redirect);

})->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN CRUD
|--------------------------------------------------------------------------
|
| IMPORTANT:
| All admin CRUD pages are now under /admin
|
*/

Route::middleware('auth:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Users
        Route::resource('users', UserController::class);

        // Variety
        Route::resource('variety', VarietyController::class);

        // Categories
        Route::resource('category', CategoryController::class);

        // Sub Categories
        Route::resource('subcategory', SubCategoryController::class);

        // Products
        Route::resource('products', ProductController::class);

        // Billboards
        Route::resource('billboards', BillboardController::class);

        // Collections
        Route::resource('collections', CollectionController::class);

        // Blog
        Route::resource('blog', BlogController::class);

        // Signatures
        Route::resource('signature', SignatureController::class);

        // Contact Messages
        Route::resource('contact-messages', ContactMessageController::class);

        // FAQ
        Route::resource('faq', FAQController::class);


        /*
        |--------------------------------------------------------------------------
        | Admin Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('profile');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::post('/profile/update', [ProfileController::class, 'update'])
            ->name('profile.update');


        /*
        |--------------------------------------------------------------------------
        | Admin Search
        |--------------------------------------------------------------------------
        */

        Route::get('/search', [SearchController::class, 'search'])
            ->name('search');

    });


/*
|--------------------------------------------------------------------------
| USER FRONTEND
|--------------------------------------------------------------------------
*/

// All Products Page
Route::get('/products', [IndexController::class, 'allProducts'])
    ->name('user.products');


// All Collections Page
Route::get('/collections', [CollectionController::class, 'frontendIndex'])
    ->name('user.collections');


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::post('/cart/add', [CartController::class, 'add'])
    ->name('cart.add');