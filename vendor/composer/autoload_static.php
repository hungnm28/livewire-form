<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccf8041b35f124a365b16faa3faa00f3
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hungnm28\\LivewireForm\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hungnm28\\LivewireForm\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitccf8041b35f124a365b16faa3faa00f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccf8041b35f124a365b16faa3faa00f3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitccf8041b35f124a365b16faa3faa00f3::$classMap;

        }, null, ClassLoader::class);
    }
}
