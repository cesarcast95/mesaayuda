<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Menu;
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
        /*Este provider permitirá que se pueda enviar una función a la vista aside
        la cual administra los menús dinámicos deacuerdo a los roles y los perisos que estos
        tengan asignados*/
        Schema::defaultStringLength(191);
        
        View::composer('layouts.app', function ($view) {
            $menus = Menu::getMenu(true);
            $view->with('menusComposer', $menus);
        });
    }
}
