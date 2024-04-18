<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17f9cb0ea21bba6655217385ed0b8082
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MiAplicacion\\' => 13,
        ),
        'H' => 
        array (
            'Hackzilla\\PasswordGenerator\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MiAplicacion\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Hackzilla\\PasswordGenerator\\' => 
        array (
            0 => __DIR__ . '/..' . '/hackzilla/password-generator',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17f9cb0ea21bba6655217385ed0b8082::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17f9cb0ea21bba6655217385ed0b8082::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit17f9cb0ea21bba6655217385ed0b8082::$classMap;

        }, null, ClassLoader::class);
    }
}