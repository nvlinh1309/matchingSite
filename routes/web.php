<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


use App\Product;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'user\UserController@index')->name('home');
Route::get('logout', function () {
    Auth::logout();
    $products = Product::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    return redirect('/');
})->name('getLogout');
Route::get('login', 'user\UserController@login')->name('login');
Route::post('login', 'user\UserController@postLogin')->name('postLogin');

Route::get('forgot-pass','user\UserController@forgot_pass')->name('forgot_pass');
Route::post('forgot-pass','user\UserController@postForgot_pass')->name('postForgot_pass');
Route::get('reset_pass/{id}/{token}','user\UserController@reset_pass')->name('reset_pass');
Route::post('reset_pass/{id}/{token}','user\UserController@post_Reset_pass')->name('post_Reset_pass');

//Register
Route::get('register', 'user\RegisterController@register')->name('register');
Route::post('register', 'user\RegisterController@post_Register')->name('post_Register');
Route::get('verify_email/{email}/{token}','user\RegisterController@verify_email')->name('verify_email');
Route::get('verify_email', function (){
    return '<p style="text-align: center">Validation expired! Please <a href="./login">Login here</a> </p>';
});




Route::get('info','user\UserController@info')->name('info');
Route::post('info','user\UserController@changeInfo')->name('changeInfo');


Route::get('messages','user\UserController@messages')->name('messages');
Route::get('messages/{product_id}/{user_id_to}','user\UserController@messages_detail')->name('messages_detail');

Route::get('change-email','user\UserController@change_mail')->name('change_mail');

Route::get('change-password','user\UserController@change_password')->name('change_password');
Route::post('change-password','user\UserController@postChangePassword')->name('postChangePassword');

//** Product
// Add new
Route::get('add-new','user\ProductController@addnew')->name('add_new_product');
Route::get('detail/{id}', 'user\ProductController@detail')->name('detail');
Route::get('products','user\ProductController@products')->name('products');

//Contact
Route::post('detail/{id}', 'user\ProductController@send_contact')->name('send_contact');

///**
// * Login Route(s)
// */
//Route::prefix('auth')->group(function () {
//    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//    Route::post('login', 'Auth\LoginController@login');
//    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//    /**
//     * Register Route(s)
//     */
//    Route::get('register/send', 'Auth\CheckmailController@showSendmailForm')->name('register.send');
//    Route::post('register/send', 'Auth\CheckmailController@register');
//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register');
//    /**
//     * Password Reset Route(S)
//     */
//    Route::get('password/forgot', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//    /**
//     * Email Verification Route(s)
//     */
//    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//});


