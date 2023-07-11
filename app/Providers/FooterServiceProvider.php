<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\View\Composers\FooterComposer;
use Illuminate\Support\ServiceProvider;

class FooterProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('partials.footer',FooterComposer::class);
    }
}
