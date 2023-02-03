<?php

namespace App\Providers;

use App\View\Composer\SliderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SliderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'pages.index', SliderComposer::class
        );
    }
}
