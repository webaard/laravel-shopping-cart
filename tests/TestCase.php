<?php

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \Webaard\LaravelShoppingCart\Providers\LaravelShoppingCartProvider::class,
        ];
    }
}