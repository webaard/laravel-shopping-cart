<?php

namespace Webaard\LaravelShoppingCart;

use Illuminate\Support\ServiceProvider;

class LaravelShoppingCartServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('cart', function () {
            return new Cart();
        });
    }
}