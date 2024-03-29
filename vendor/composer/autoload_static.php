<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3ed9dbcfdcfee4823a255686813186d
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf3ed9dbcfdcfee4823a255686813186d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf3ed9dbcfdcfee4823a255686813186d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf3ed9dbcfdcfee4823a255686813186d::$classMap;

        }, null, ClassLoader::class);
    }
}
