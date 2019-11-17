<?php

Route::resource('banks', 'BankController');
Route::get('/', 'PageController@index')->name('index');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/services', 'PageController@services')->name('service');
Route::get('/blogs', 'PageController@blog')->name('blogs');
Route::get('/contact', 'PageController@contact')->name('contact');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('mail', 'MailController@show')->name('mail.show');
    Route::post('mail', 'MailController@send')->name('mail.send');
    Route::resource('loans', 'LoanController');
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::prefix('admin1')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('/register', 'AdminAuth\RegisterController@register')->name('admin.register.submit');
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('loans', 'AdminLoanController@allLoans')->name('allLoans');

    });
});
