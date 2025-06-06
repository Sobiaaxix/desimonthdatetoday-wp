<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb42d6afa60d05e19b9ef1fac91c18e1e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb42d6afa60d05e19b9ef1fac91c18e1e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb42d6afa60d05e19b9ef1fac91c18e1e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb42d6afa60d05e19b9ef1fac91c18e1e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
