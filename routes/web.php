<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TestimonialController;
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

use App\Http\Controllers\Home\IndexController;


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [IndexController::class, 'index'])
    ->name('frontend.home');


/*
|--------------------------------------------------------------------------
| Laravel Authentication
|--------------------------------------------------------------------------
*/

Auth::routes();


/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])
    ->name('admin.login');

Route::post('/login/admin', [LoginController::class, 'adminLogin']);


/*
|--------------------------------------------------------------------------
| Writer Login
|--------------------------------------------------------------------------
*/

Route::get('/login/writer', [LoginController::class, 'showWriterLoginForm'])
    ->name('writer.login');

Route::post('/login/writer', [LoginController::class, 'writerLogin']);


/*
|--------------------------------------------------------------------------
| Admin Register
|--------------------------------------------------------------------------
*/

Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm'])
    ->name('admin.register');

Route::post('/register/admin', [RegisterController::class, 'registerAdmin']);


/*
|--------------------------------------------------------------------------
| Writer Register
|--------------------------------------------------------------------------
*/

Route::get('/register/writer', [RegisterController::class, 'showWriterRegisterForm'])
    ->name('writer.register');

Route::post('/register/writer', [RegisterController::class, 'registerWriter']);


/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/home', [IndexController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| Admin Dashboard + Admin CRUD
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')
    ->prefix('admin')
    ->group(function () {

        /*
        | Admin Dashboard
        */
        Route::view('/', 'admin.index')
            ->name('admin.dashboard');


        /*
        | Users
        | /admin/users
        */
        Route::resource('users', UserController::class);


        /*
        | Variety
        | /admin/variety
        */
        Route::resource('variety', VarietyController::class);


        /*
        | Categories
        | /admin/category
        */
        Route::resource('category', CategoryController::class);


        /*
        | Sub Categories
        | /admin/subcategory
        */
        Route::resource('subcategory', SubCategoryController::class);


        /*
        | Products
        | /admin/products
        */
        Route::resource('products', ProductController::class);


        /*
        | Billboards
        | /admin/billboards
        */
        Route::resource('billboards', BillboardController::class);


        /*
        | Collections
        | /admin/collections
        */
        Route::resource('collections', CollectionController::class);


        /*
        | Testimonials
        | /admin/testimonials
        */
        Route::resource('testimonials', TestimonialController::class);


        /*
        | Blog
        | /admin/blog
        */
        Route::resource('blog', BlogController::class);


        /*
        | Contact Messages
        | /admin/contact-messages
        */
        Route::resource('contact-messages', ContactMessageController::class);


        /*
        | FAQ
        | /admin/faq
        */
        Route::resource('faq', FAQController::class);


        /*
        | Admin Profile
        */
        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('admin.profile');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])
            ->name('admin.profile.edit');

        Route::post('/profile/update', [ProfileController::class, 'update'])
            ->name('admin.profile.update');


        /*
        | Admin Search
        */
        Route::get('/search', [SearchController::class, 'search'])
            ->name('admin.search');
    });


/*
|--------------------------------------------------------------------------
| Writer Dashboard
|--------------------------------------------------------------------------
*/

Route::view('/writer', 'user.index')
    ->middleware('auth:writer')
    ->name('writer.dashboard');


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    if (Auth::guard('admin')->check()) {

        Auth::guard('admin')->logout();

        $redirect = '/';

    } elseif (Auth::guard('writer')->check()) {

        Auth::guard('writer')->logout();

        $redirect = '/';

    } elseif (Auth::guard('web')->check()) {

        Auth::guard('web')->logout();

        $redirect = '/';

    } else {

        $redirect = '/';
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect($redirect);

})->name('logout');