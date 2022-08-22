<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('manager.bootstrap.link', 'link');
        Blade::component('manager.bootstrap.scriptSrc', 'scriptSrc');
        Blade::component('manager.bootstrap.alert', 'alert');
        Blade::component('manager.bootstrap.button', 'button');
        Blade::component('manager.bootstrap.badge', 'badge');
        Blade::component('manager.bootstrap.breadcrumb', 'breadcrumb');
        Blade::component('manager.bootstrap.button-group', 'buttonGroup');
        Blade::component('manager.bootstrap.card', 'card');
        Blade::component('manager.bootstrap.carousel', 'carousel');
        Blade::component('manager.bootstrap.figure', 'figure');
        Blade::component('manager.bootstrap.input-group', 'inputGroup');
        Blade::component('manager.bootstrap.jumbotron', 'jumbotron');
        Blade::component('manager.bootstrap.list-group', 'listGroup');
        Blade::component('manager.bootstrap.modal', 'modal');
        Blade::component('manager.bootstrap.pagination', 'pagination');
        Blade::component('manager.bootstrap.render.pagination', 'pagination');
        Blade::component('manager.bootstrap.progress', 'progress');
        Blade::component('manager.bootstrap.table', 'table');
        Blade::component('manager.bootstrap.a', 'a');
        Blade::component('manager.bootstrap.i', 'i');
        Blade::component('manager.bootstrap.input', 'input');
        Blade::component('manager.bootstrap.img', 'img');
    }
}
