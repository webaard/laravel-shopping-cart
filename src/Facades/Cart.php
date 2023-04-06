<?php

namespace Webaard\LaravelShoppingCart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @mixin \Webaard\LaravelShoppingCart\Cart
 *
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
