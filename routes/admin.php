<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Chart\ChartController;

Route::group(['prefix' => 'admin' , 'namespace' => 'Admin\Auth'], function () {

    Route::get('/register', ['uses' => 'RegisterController@showRegistrationForm', 'as' => 'admin.register']);
    Route::post('/register', ['uses' => 'RegisterController@register', 'as' => 'admin.submit.register']);

    Route::get('login'   , ['uses' => 'LoginController@showLoginForm' , 'as' => 'admin.login']);
    Route::post('login'   , ['uses' => 'LoginController@login' , 'as' => 'admin.login.submit']);
    Route::post('logout' , ['uses' => 'LoginController@logout' , 'as' => 'admin.logout']);

    Route::group(['prefix' => 'forget-password'], function () {
        Route::get('/email', ['uses' => 'ForgotPasswordController@showLinkRequestForm', 'as' => 'admin.password.request']);
        Route::post('/email', ['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as' => 'admin.password.email']);
        Route::get('/reset/{token}', ['uses' => 'ResetPasswordController@showResetForm', 'as' => 'admin.password.reset']);
        Route::post('/reset', ['uses' => 'ResetPasswordController@reset', 'as' => 'admin.password.reset.submit']);
    });
});

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function(){
    Route::get('/', ['uses' => 'AdminController@index' , 'as' => 'admin.dashboard']);

    Route::get('profile', 'ProfileController@index')->name('admin.profile');
    Route::get('profile/edit', ['uses' => 'ProfileController@edit', 'as' => 'admin.profile.edit']);
    Route::post('profile/update', ['uses' => 'ProfileController@update', 'as' => 'admin.profile.update']);

    Route::get('/subAdminsIndex', ['uses' => 'AdminController@subAdminsIndex', 'as' => 'admin.subadmin.index']);
    Route::get('/subadmincreate', ['uses' => 'AdminController@subadmincreate', 'as' => 'admin.subadmin.create']);
    Route::get('/subadmindestroy/{admin}', ['uses' => 'AdminController@subadmindestroy', 'as' => 'admin.subadmin.destroy']);
    Route::get('/subadminchangestatus/{admin}', ['uses' => 'AdminController@subadminchangestatus', 'as' => 'admin.subadmin.changestatus']);

    Route::group(['namespace' => 'Task'], function(){
        Route::post('/predictManagers', 'TaskController@predictManagers')->name('managers.predict');
        Route::resource('adminTasks', 'TaskController');
    });

    Route::group(['namespace' => 'Department'], function(){
        Route::resource('departments', 'DepartmentController');
    });

    Route::group(['namespace' => 'Manager'], function(){
        Route::get('/changeStatus/{manager}', 'ManagerController@changeStatus')->name('managers.changeStatus');
        Route::resource('managers', 'ManagerController');
    });

    Route::group(['namespace' => 'Project'], function(){
        Route::resource('projects', 'ProjectController');
    });

    // Route::group(['namespace' => 'Chart'], function(){
    // Route::get('charts' , 'ChartController')->name('charts.index');
    // });
});