<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manager' , 'namespace' => 'Manager\Auth'], function () {

    Route::get('/register', ['uses' => 'RegisterController@showRegistrationForm', 'as' => 'manager.register']);
    Route::post('/register', ['uses' => 'RegisterController@register', 'as' => 'manager.submit.register']);

    Route::get('login'   , ['uses' => 'LoginController@showLoginForm' , 'as' => 'manager.login']);
    Route::post('login'   , ['uses' => 'LoginController@login' , 'as' => 'manager.login.submit']);
    Route::post('logout' , ['uses' => 'LoginController@logout' , 'as' => 'manager.logout']);

    Route::group(['prefix' => 'forget-password'], function () {
        Route::get('/email', ['uses' => 'ForgotPasswordController@showLinkRequestForm', 'as' => 'manager.password.request']);
        Route::post('/email', ['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as' => 'manager.password.email']);
        Route::get('/reset/{token}', ['uses' => 'ResetPasswordController@showResetForm', 'as' => 'manager.password.reset']);
        Route::post('/reset', ['uses' => 'ResetPasswordController@reset', 'as' => 'manager.password.reset.submit']);
    });
});

Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'auth:manager'], function(){
    Route::get('/', ['uses' => 'ManagerController@index' , 'as' => 'manager.dashboard']);

    Route::get('profile', 'ProfileController@index')->name('manager.profile');
    Route::get('profile/edit', ['uses' => 'ProfileController@edit', 'as' => 'manager.profile.edit']);
    Route::post('profile/update', ['uses' => 'ProfileController@update', 'as' => 'manager.profile.update']);
});
