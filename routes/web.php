<?php


Route::get('/', 'PageController@index')->name('index');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/services', 'PageController@services')->name('service');
Route::get('/blogs', 'PageController@blog')->name('blogs');
Route::get('/contact', 'PageController@contact')->name('contact');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('banks', 'BankController');
    Route::get('mail', 'MailController@show')->name('mail.show');
    Route::post('mail', 'MailController@send')->name('mail.send');
    Route::resource('loans', 'LoanController');
    // Route::get('loans/{id}', 'LoanController@create')->name('create.loan');//id of the

    Route::get('/home', 'HomeController@index')->name('home');
});
Route::prefix('admin1')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

   Route::group(['middleware' => ['auth:admin']], function () {
   Route::get('/', 'AdminController@index')->name('admin.dashboard');
   Route::get('loans', 'AdminLoanController@allLoans')->name('allLoans');
   Route::delete('loans/{id}', 'AdminLoanController@deleteloan')->name('deleteloan');
   Route::get('/mails', 'AdminLoanController@showMail')->name('admin.mail');
   Route::post('/mails', 'AdminLoanController@sendMail')->name('admin.mail.send');

   Route::resource('profile', 'AdminController')->except(['index']);

    });
    Route::put('/approve/{id}', 'AdminLoanController@approve')->name('approve');
    Route::put('/cancel/{id}', 'AdminLoanController@cancel')->name('cancel');
});
