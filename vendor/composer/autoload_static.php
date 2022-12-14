<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5982eabce602f6c7657d864f7d96183a
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Dispatcher' => __DIR__ . '/..' . '/benoclock/alto-dispatcher/Dispatcher.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5982eabce602f6c7657d864f7d96183a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5982eabce602f6c7657d864f7d96183a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5982eabce602f6c7657d864f7d96183a::$classMap;

        }, null, ClassLoader::class);
    }
}
