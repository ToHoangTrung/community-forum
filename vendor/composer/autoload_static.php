<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65f4da288a171681df23d8c48935454c
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        '713b52c45daebafcea655af0c213c935' => __DIR__ . '/..' . '/panique/php-sass/sass-compiler.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
        ),
        'L' => 
        array (
            'Leafo\\ScssPhp\\' => 14,
        ),
        'G' => 
        array (
            'GrahamCampbell\\ResultType\\' => 26,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'Leafo\\ScssPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/leafo/scssphp/src',
        ),
        'GrahamCampbell\\ResultType\\' => 
        array (
            0 => __DIR__ . '/..' . '/graham-campbell/result-type/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
        'scss_formatter' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_formatter_compressed' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_formatter_crunched' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_formatter_nested' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_parser' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_server' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scssc' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit65f4da288a171681df23d8c48935454c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit65f4da288a171681df23d8c48935454c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit65f4da288a171681df23d8c48935454c::$classMap;

        }, null, ClassLoader::class);
    }
}
