<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c51f28f31d883fe1f1a442dcb150ef4
{
    public static $files = array (
        '44ef1d8ec27ad01e41d8f15ce932b11b' => __DIR__ . '/../..' . '/source/Boot/Config.php',
        '05de05ae944629deebff09b1e7131018' => __DIR__ . '/../..' . '/source/Boot/Helpers.php',
        'a5cccdecb2f40aa7204a65356dcba09d' => __DIR__ . '/../..' . '/source/Boot/Minify.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WebPConvert\\' => 12,
        ),
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'MatthiasMullie\\PathConverter\\' => 29,
            'MatthiasMullie\\Minify\\' => 22,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'I' => 
        array (
            'ImageMimeTypeGuesser\\' => 21,
        ),
        'C' => 
        array (
            'CoffeeCode\\Uploader\\' => 20,
            'CoffeeCode\\Router\\' => 18,
            'CoffeeCode\\Paginator\\' => 21,
            'CoffeeCode\\Optimizer\\' => 21,
            'CoffeeCode\\Cropper\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WebPConvert\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/webp-convert/src',
        ),
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'MatthiasMullie\\PathConverter\\' => 
        array (
            0 => __DIR__ . '/..' . '/matthiasmullie/path-converter/src',
        ),
        'MatthiasMullie\\Minify\\' => 
        array (
            0 => __DIR__ . '/..' . '/matthiasmullie/minify/src',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'ImageMimeTypeGuesser\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src',
        ),
        'CoffeeCode\\Uploader\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/uploader/src',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
        'CoffeeCode\\Paginator\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/paginator/src',
        ),
        'CoffeeCode\\Optimizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/optimizer/src',
        ),
        'CoffeeCode\\Cropper\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/cropper/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c51f28f31d883fe1f1a442dcb150ef4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c51f28f31d883fe1f1a442dcb150ef4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c51f28f31d883fe1f1a442dcb150ef4::$classMap;

        }, null, ClassLoader::class);
    }
}