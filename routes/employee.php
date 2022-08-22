<?php
 
 use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'employee' , 'namespace' => 'Employee\Auth'], function () {

    Route::get('/register', ['uses' => 'RegisterController@showRegistrationForm', 'as' => 'employee.register']);
    Route::post('/register', ['uses' => 'RegisterController@register', 'as' => 'employee.submit.register']);

    Route::get('login'   , ['uses' => 'LoginController@showLoginForm' , 'as' => 'employee.login']);
    Route::post('login'   , ['uses' => 'LoginController@login' , 'as' => 'employee.login.submit']);
    Route::post('logout' , ['uses' => 'LoginController@logout' , 'as' => 'employee.logout']);

    Route::group(['prefix' => 'forget-password'], function () {
        Route::get('/email', ['uses' => 'ForgotPasswordController@showLinkRequestForm', 'as' => 'employee.password.request']);
        Route::post('/email', ['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as' => 'employee.password.email']);
        Route::get('/reset/{token}', ['uses' => 'ResetPasswordController@showResetForm', 'as' => 'employee.password.reset']);
        Route::post('/reset', ['uses' => 'ResetPasswordController@reset', 'as' => 'employee.password.reset.submit']);
    });
});

Route::group(['prefix' => 'employee', 'namespace' => 'Employee', 'middleware' => 'auth:employee'], function(){
    Route::get('/', ['uses' => 'EmployeeController@index' , 'as' => 'employee.dashboard']);

    Route::get('profile', 'ProfileController@index')->name('employee.profile');
    Route::get('profile/edit', ['uses' => 'ProfileController@edit', 'as' => 'employee.profile.edit']);
    Route::post('profile/update', ['uses' => 'ProfileController@update', 'as' => 'employee.profile.update']);
});
