<?php

namespace Webaard\LaravelShoppingCart\Providers;

use Illuminate\Support\ServiceProvider;
use Webaard\LaravelShoppingCart\Cart;

class LaravelShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('cart', function ($app) {
            return new Cart();
        });
        //        $this->app->singleton(Cart::class, function () {
        //            return new Cart();
        //        });
        //
        //        $this->app->alias(Cart::class, 'cart');
    }
}
