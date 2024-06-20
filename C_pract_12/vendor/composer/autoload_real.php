<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit50d225b5b3b8e3b278327f26c92c7971
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

        spl_autoload_register(array('ComposerAutoloaderInit50d225b5b3b8e3b278327f26c92c7971', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit50d225b5b3b8e3b278327f26c92c7971', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit50d225b5b3b8e3b278327f26c92c7971::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
