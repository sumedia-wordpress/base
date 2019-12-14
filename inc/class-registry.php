<?php

class Sumedia_Base_Registry
{
    /**
     * @var array
     */
    protected static $vars = [];

    /**
     * @param string $name
     * @param mixed $value
     */
    public static function set($name, $value)
    {
        static::$vars[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function get($name)
    {
        if (!isset(static::$vars[$name]) && class_exists($name)) {
            static::set($name, new $name);
        }
        return static::$vars[$name];
    }
}