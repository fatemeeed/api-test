<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8eff87a03f05d3de518d9e895d8a15b2
{
    public static $files = array (
        '9e2f6c0a023558b28803ee15b1f12727' => __DIR__ . '/../..' . '/app/iran.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8eff87a03f05d3de518d9e895d8a15b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8eff87a03f05d3de518d9e895d8a15b2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8eff87a03f05d3de518d9e895d8a15b2::$classMap;

        }, null, ClassLoader::class);
    }
}
