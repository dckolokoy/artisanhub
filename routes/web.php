<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerChatController;
use App\Http\Controllers\CustomerCartController;
use App\Http\Controllers\CustomerTransactionController;
use Illuminate\Support\Facades\Route;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;
// use App\Http\Controllers\MerchantsController;

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
Route::get('/', [CustomerController::class, 'index'])->name('index');
Route::get('shop', [CustomerController::class, 'shop'])->name('shop');
Route::get('/acc', [CustomerController::class, 'acc'])->name('acc');Route::put('updateacc/{id}', [CustomerController::class, 'updateacc'])->name('updateacc');

Route::get('career', [CustomerController::class, 'career'])->name('career');
// Route::get('chat', [CustomerChatController::class, 'chat'])->name('chat');
Route::get('chat/{store_id}/{material_id}', [CustomerChatController::class, 'chat'])->name('chat');

Route::get('/transactions', [CustomerTransactionController::class, 'index'])->name('transactions');
Route::put('updateorder/{id}', [CustomerTransactionController::class, 'updateorder'])->name('updateorder');

Route::get('apply/{id}', [CustomerController::class, 'apply'])->name('apply');
Route::get('reviews', [CustomerController::class, 'reviews'])->name('reviews');
Route::get('contact-us', [CustomerController::class, 'contact_us'])->name('customer-contact-us');
Route::get('menu', [CustomerController::class, 'menu'])->name('customer-menu');
Route::get('gallery', [CustomerController::class, 'gallery'])->name('customer-gallery');
Route::get('about', [CustomerController::class, 'about'])->name('customer-about');
Route::get('privacy-policy', [CustomerController::class, 'privacyPolicy'])->name('customer-privacy-policy');
Route::get('terms-and-conditions', [CustomerController::class, 'termsAndConditions'])->name('customer-terms-and-conditions');

Route::prefix('customer')->middleware('role:customer')->group(function () {
    // Route::post('my-cart', [CustomerCartController::class, 'index'])->name('my-cart');
    Route::get('my-carts', [CustomerCartController::class, 'index'])->name('my-carts');
    Route::resource('my-cart', '\App\Http\Controllers\CustomerCartController');
    //Route::resource('chat', '\App\Http\Controllers\CustomerChatController');



    Route::post('chat', '\App\Http\Controllers\CustomerChatController@store');
    // Route::post('/chat', function(Request $request) {
    //     $message = $request->message;

    //     // insert data into the database
    //     $chat = new Chat;
    //     $chat->message = $message;
    //     $chat->save();
    //     return response()->json(['status' => 'success', 'message' => 'Data inserted successfully']);
    // });







    Route::get('add-solo-cart/{id}', '\App\Http\Controllers\CustomerCartController@addCartSinglePage');
    Route::resource('my-like', '\App\Http\Controllers\CustomerLikeController');
    Route::resource('my-unlike', '\App\Http\Controllers\CustomerUnlikeController');
    Route::get('check-item/{id}', '\App\Http\Controllers\CustomerCartController@checkItemExist');
    Route::get('check-like/{id}', '\App\Http\Controllers\CustomerCartController@checkLike');
    //  Route::get('cart', [CustomerCartController::class, 'index'])->name('customer-cart');
    Route::get('cart/history', [CustomerController::class, 'cartHistory'])->name('customer-cart-history');
    Route::get('reservations', [CustomerController::class, 'reservations'])->name('customer-reservations');
    Route::get('my-reservations', [CustomerController::class, 'myReservations'])->name('customer-my-reservations');
    Route::get('my-reservations/history', [CustomerController::class, 'myReservationsHistory'])->name('customer-my-reservations-history');
    Route::get('add-to-cart/{menuId}', [CustomerController::class, 'addToCart'])->name('customer-add-to-cart');
    Route::resource('checkout', '\App\Http\Controllers\CustomerCheckoutController');
});

Route::get('login', [CustomerController::class, 'login'])->name('customer-login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('register', [CustomerController::class, 'register'])->name('customer-register');

Route::post('reviews', [CustomerController::class, 'postReview'])->name('customer-review-submit');

Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('get', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');



// Registration Routes...
Route::get('register', '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', '\App\Http\Controllers\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', '\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', '\App\Http\Controllers\Auth\ResetPasswordController@reset');

//admin role dashboard
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::resource('dashboard', '\App\Http\Controllers\AdminDashboardController');
    Route::resource('product', '\App\Http\Controllers\AdminProductController');
    Route::resource('menu-category', '\App\Http\Controllers\AdminMenuCategoryController');
    Route::resource('career', '\App\Http\Controllers\AdminCareerController');
    Route::resource('chat', '\App\Http\Controllers\AdminChatController');
    Route::resource('category', '\App\Http\Controllers\AdminMenuCategoryController');
    Route::resource('client', '\App\Http\Controllers\AdminClientController');
    Route::resource('admin', '\App\Http\Controllers\AdminAdminController');
    Route::resource('member', '\App\Http\Controllers\AdminMemberController');
    Route::get('/admin/member/{id}/delete', '\App\Http\Controllers\AdminMemberController@destroy')->name('members.destroy');
    Route::get('/admin/client/{id}/delete', '\App\Http\Controllers\AdminClientController@destroy')->name('customer.destroy');
    Route::get('/admin/admin/{id}/delete', '\App\Http\Controllers\AdminAdminController@destroy')->name('admins.destroy');
    Route::resource('membership', '\App\Http\Controllers\AdminMembershipController');
    Route::prefix('user')->group(function () {
        Route::resource('pending', '\App\Http\Controllers\AdminUserPendingController');
        Route::resource('approved', '\App\Http\Controllers\AdminUserApprovedController');
        Route::resource('declined', '\App\Http\Controllers\AdminUserDeclinedController');
    });
    Route::prefix('transaction')->group(function () {
        Route::resource('order', '\App\Http\Controllers\AdminTransactionOrderController');
        Route::resource('reservation', '\App\Http\Controllers\AdminTransactionReservationController');
        Route::resource('scheduled', '\App\Http\Controllers\AdminTransactionScheduledController');
        Route::get('get-order-list/{id}', '\App\Http\Controllers\AdminTransactionOrderController@getOrderItem');
    });
});

Route::prefix('member')->middleware('role:admin')->group(function () {
    Route::post('chat', '\App\Http\Controllers\Member\MemberChatController@store');
    Route::resource('dashboard', '\App\Http\Controllers\AdminDashboardController');
    Route::resource('product', '\App\Http\Controllers\Member\AdminProductController');
    Route::resource('category', '\App\Http\Controllers\Member\CategoryController');
    Route::resource('account', '\App\Http\Controllers\Member\AccountController');
    Route::resource('admin', '\App\Http\Controllers\AdminAdminController');
    Route::resource('chat', '\App\Http\Controllers\Member\MemberChatController');
    Route::resource('membership', '\App\Http\Controllers\MemberMembershipController');
    Route::resource('menu-category', '\App\Http\Controllers\Member\AdminMenuCategoryController');
    Route::prefix('transaction')->group(function () {
        Route::resource('order', '\App\Http\Controllers\Member\TransactionOrderController');
        Route::resource('reservation', '\App\Http\Controllers\AdminTransactionReservationController');
        Route::resource('scheduled', '\App\Http\Controllers\AdminTransactionScheduledController');
        Route::get('get-order-list/{id}', '\App\Http\Controllers\AdminTransactionOrderController@getOrderItem');
        Route::get('get-info/{id}', '\App\Http\Controllers\Member\TransactionOrderController@getUserInfo');
    });
});
Route::get('member-chat/{store_id}/{customer_id}', '\App\Http\Controllers\Member\MemberChatController@chat')->name('member-chat');


//admin role dashboard
Route::prefix('superadmin')->middleware('role:admin')->group(function () {
    Route::resource('dashboard', '\App\Http\Controllers\AdminDashboardController');
    Route::resource('menu-item', '\App\Http\Controllers\AdminMenuItemController');
    Route::resource('menu-category', '\App\Http\Controllers\AdminMenuCategoryController');
    Route::resource('category', '\App\Http\Controllers\AdminMenuCategoryController');
    Route::resource('client', '\App\Http\Controllers\AdminClientController');
    Route::resource('admin', '\App\Http\Controllers\AdminAdminController');
    Route::prefix('transaction')->group(function () {
        Route::resource('order', '\App\Http\Controllers\AdminTransactionOrderController');
        Route::resource('reservation', '\App\Http\Controllers\AdminTransactionReservationController');
        Route::resource('scheduled', '\App\Http\Controllers\AdminTransactionScheduledController');
    });
});


// Route::get('payment', 'PaymentController@index');
// Route::post('charge', 'PaymentController@charge');
// Route::get('success', 'PaymentController@success');
// Route::get('error', 'PaymentController@error');

Route::get('payment', '\App\Http\Controllers\PaymentController@index');
Route::post('charge', '\App\Http\Controllers\PaymentController@charge');
Route::get('success', '\App\Http\Controllers\PaymentController@success');
Route::get('error', '\App\Http\Controllers\PaymentController@error');

Route::resource('transaction', '\App\Http\Controllers\TransactionController');

Route::get('/single/{id}', '\App\Http\Controllers\SingleProductController@show')->name('single.show');
Route::get('search', '\App\Http\Controllers\CustomerController@search');
Route::get('search-seller/{id}', '\App\Http\Controllers\CustomerController@searchSeller');


Route::get('routeName/{material_id}/{store_id}/{customer_id}', '\App\Http\Controllers\CustomerChatController@section');
Route::get('routeNames/{material_id}/{customer_id}', '\App\Http\Controllers\Member\MemberChatController@section');


Route::get('side-menu', '\App\Http\Controllers\AdminNotificationController@sideMenu'); //jaba
Route::get('customer-side-menu', '\App\Http\Controllers\CustomerNotificationController@sideMenu'); //jaba2
Route::get('get-notification', '\App\Http\Controllers\CustomerNotificationController@getNotification'); //jaba2
Route::post('update-notification/{id}', '\App\Http\Controllers\CustomerNotificationController@updateNotification');//jaba2

Route::post('/chat/mark-as-read', '\App\Http\Controllers\CustomerNotificationController@markAsRead')->name('chat.mark-as-read');
Route::post('/chat/mark-as-read2', '\App\Http\Controllers\MemberNotificationController@markAsRead')->name('chat.mark-as-read-member');
