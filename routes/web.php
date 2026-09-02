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
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;

use App\Http\Controllers\Admin\BillboardController;
use App\Http\Controllers\Admin\VarietyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SignatureController;

use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendSearchController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AiChatController;
use App\Http\Controllers\Admin\DashboardController;


use App\Mail\OrderStatusMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;




/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

// Auth::routes();


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
Route::get('/admin', [DashboardController::class, 'index'])
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

        // Billboards
        Route::resource('billboards', BillboardController::class);
                  
        // variety
        

        Route::resource('varieties', VarietyController::class);



        // Categories
        Route::resource('category', CategoryController::class);

        // Sub Categories
        Route::resource('subcategory', SubCategoryController::class);

        // Products
        Route::resource('products', ProductController::class);

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

        // Orders
        Route::resource('orders', OrderController::class);

       
    

/*
|--------------------------------------------------------------------------
| Newsletter Subscribers
|--------------------------------------------------------------------------
*/

Route::get(
    '/newsletter-subscribers',
    [NewsletterSubscriberController::class, 'index']
)->name('newsletter.index');

Route::post(
    '/newsletter-subscribers',
    [NewsletterSubscriberController::class, 'store']
)->name('newsletter.store');

Route::get(
    '/newsletter-subscribers/{subscriber_id}/edit',
    [NewsletterSubscriberController::class, 'edit']
)->name('newsletter.edit');

Route::put(
    '/newsletter-subscribers/{subscriber_id}',
    [NewsletterSubscriberController::class, 'update']
)->name('newsletter.update');

Route::patch(
    '/newsletter-subscribers/{subscriber_id}/toggle-status',
    [NewsletterSubscriberController::class, 'toggleStatus']
)->name('newsletter.toggle-status');

Route::delete(
    '/newsletter-subscribers/{subscriber_id}',
    [NewsletterSubscriberController::class, 'destroy']
)->name('newsletter.destroy');



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

// Home
Route::get('/', [IndexController::class, 'index'])
    ->name('frontend.home');

// All Products
Route::get('/products', [ProductController::class, 'frontendIndex'])
    ->name('user.products');
    // Contact
Route::get('/contact', [IndexController::class, 'contact'])
    ->name('contact');

Route::post('/contact', [IndexController::class, 'storeContact'])
    ->name('contact.store');

// All Collections
Route::get('/collections', [CollectionController::class, 'frontendIndex'])
    ->name('user.collections');
    // Single Collection Detail
Route::get('/collection/{collection}', [CollectionController::class, 'frontendShow'])
    ->name('collection.detail');

// Category
Route::get('/category/{slug}', [CategoryController::class, 'frontendShow'])
    ->name('category.show');

// Sub Category
Route::get('/subcategory/{slug}', [SubCategoryController::class, 'frontendShow'])
    ->name('subcategory.show');

// Single Product
Route::get('/product/{slug}', [ProductController::class, 'frontendShow'])
    ->name('product.show');

// Cart
Route::get('/cart', [CartController::class, 'show'])
    ->name('cart.show');

Route::post('/cart/add-product', [CartController::class, 'addProduct'])
    ->name('cart.add.product');

Route::post('/cart/add-signature', [CartController::class, 'addSignature'])
    ->name('cart.add.signature');

Route::post('/cart/add-subcategory', [CartController::class, 'addSubCategory'])
    ->name('cart.add.subcategory');
    Route::post('/cart/add-collection', [CartController::class, 'addCollection']) 
    ->name('cart.add.collections');

// Blogs
Route::get('/blogs', [BlogController::class, 'frontendIndex'])
    ->name('blogs');

Route::get('/blog/{slug}', [BlogController::class, 'frontendShow'])
    ->name('blog.show');

// Signatures
Route::get('/signatures', [SignatureController::class, 'frontendIndex'])
    ->name('signatures');

Route::get('/signature/{signature_id}', [SignatureController::class, 'frontendShow'])
    ->name('signature.show');











    // Cart Quantity
Route::get('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

// Remove Cart Item
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

// Clear Cart
Route::get('/cart/clear', [CartController::class, 'clear'])
    ->name('cart.clear');


    // Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

// Order Success
Route::get('/order-success/{order_id}', [CheckoutController::class, 'success'])
    ->name('order.success');



    Route::get('/search', [FrontendSearchController::class, 'search'])
    ->name('frontend.search');





    Route::post('/newsletter/subscribe', [
    NewsletterController::class,
    'subscribe'
])->name('newsletter.subscribe');
Route::get('/newsletter', [NewsletterController::class, 'index'])
    ->name('newsletter.index');











/*
|--------------------------------------------------------------------------
| kiara AI Shopping Assistant
|--------------------------------------------------------------------------
*/

Route::get('/ai/categories', [AiChatController::class, 'categories'])
    ->name('ai.categories');

Route::post('/ai/chat', [AiChatController::class, 'chat'])
    ->name('ai.chat');







    Route::get('/test-order-email', function () {

    $order = Order::latest()->first();

    if (!$order) {
        return 'No order found in database.';
    }

    Mail::to($order->email)
        ->send(new OrderStatusMail($order, 'confirmed'));

    return 'Email sent successfully! Check Mailtrap.';
});










Route::get('/varieties/{variety}', [IndexController::class, 'showVariety'])
    ->name('variety.show');