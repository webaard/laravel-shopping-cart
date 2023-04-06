<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc80f90427231b2282f6cd06cbc17e95
{
    public static $files = array (
        '9b38cf48e83f5d8f60375221cd213eee' => __DIR__ . '/..' . '/phpstan/phpstan/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webaard\\LaravelShoppingCart\\' => 28,
        ),
        'D' => 
        array (
            'Database\\Seeders\\' => 17,
            'Database\\Factories\\' => 19,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webaard\\LaravelShoppingCart\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Database\\Seeders\\' => 
        array (
            0 => __DIR__ . '/..' . '/laravel/pint/database/seeders',
        ),
        'Database\\Factories\\' => 
        array (
            0 => __DIR__ . '/..' . '/laravel/pint/database/factories',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/..' . '/laravel/pint/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc80f90427231b2282f6cd06cbc17e95::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc80f90427231b2282f6cd06cbc17e95::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc80f90427231b2282f6cd06cbc17e95::$classMap;

        }, null, ClassLoader::class);
    }
}
