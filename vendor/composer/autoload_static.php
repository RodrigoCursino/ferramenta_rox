<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45f222e5630023c41e69ff68081c49c9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45f222e5630023c41e69ff68081c49c9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45f222e5630023c41e69ff68081c49c9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
