<?php

namespace KdG;

class StaticCache
{
    private static $instance = null;
    private $cache = [];

    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct(){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new StaticCache();
        }

        return self::$instance;
    }

    private function set($key, $value)
    {
        $this->cache[$key] = $value;
    }

    private function get($key)
    {
        if (array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }

        return null;
    }

    /**
     * For easy access
     */
    public static function __callStatic($chrMethod, $arrArguments)
    {
        $instance = self::getInstance();

        return call_user_func_array(array($instance, $chrMethod), $arrArguments);
    }
}
