<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d046239f37404d80b300699c7a042df
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TaskManager\\Classes\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TaskManager\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d046239f37404d80b300699c7a042df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d046239f37404d80b300699c7a042df::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}