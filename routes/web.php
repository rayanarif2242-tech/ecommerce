<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VarietyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillboardController;
use App\Http\Controllers\CollectionController;


use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FAQController;

use App\Http\Controllers\Home\IndexController;




Route::view('/', 'welcome');

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


// Dashboard Routes
Route::get('/home', [IndexController::class, 'index'])->name('home');

Route::view('/admin', 'admin.index')
    ->middleware('auth:admin')
    ->name('admin.dashboard');


Route::view('/writer', 'user.index')
    ->middleware('auth:writer');
   
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

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {

    Route::resource('users', UserController::class);

});

Route::middleware('auth:admin')->group(function () {

    Route::resource('variety', VarietyController::class);

});
Route::middleware('auth:admin')->group(function () {
    Route::resource('category', CategoryController::class);
});
Route::resource('subcategory', SubCategoryController::class);
Route::resource(
'products',
ProductController::class
);

Route::resource('billboards', BillboardController::class);

Route::resource('collections', CollectionController::class);





Route::resource('blog', BlogController::class);

Route::get('/admin/profile', [ProfileController::class, 'index'])
    ->name('admin.profile');

Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])
    ->name('admin.profile.edit');

Route::post('/admin/profile/update', [ProfileController::class, 'update'])
    ->name('admin.profile.update');


   Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/search', [SearchController::class, 'search'])
        ->name('admin.search');

});


Route::resource(
    'contact-messages',
    ContactMessageController::class
);

Route::resource(
    'faq',
    FAQController::class
);




Route::get('/', [IndexController::class, 'index'])->name('frontend.home');