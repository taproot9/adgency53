<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //        View::composer('pages.profile', 'App\Http\ViewComposers\ProfileComposer');


//        View::composer(['pages.profile', 'pages.settings'], 'App\Http\ViewComposers\ProfileComposer');
        View::creator(['pages.profile', 'pages.settings'], 'App\Http\ViewComposers\AdminComposer');
    }
}
