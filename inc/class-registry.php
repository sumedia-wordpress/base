<?php

class Sumedia_Base_Registry
{
    /**
     * @var array
     */
    protected static $vars = [];

    /**
     * @var array
     */
    protected static $factories = [];

    /**
     * @param string $name
     * @param mixed $value
     */
    public static function set($name, $value)
    {
        static::$vars[$name] = $value;
    }

    /**
     * @param string $class_name
     * @param Sumedia_Base_Factory $factory
     */
    public static function set_factory($class_name, $factory)
    {
        static::$factories[$class_name] = $factory;
    }

    /**
     * @param $class_name
     * @return Sumedia_Base_Factory
     */
    public static function get_factory($class_name)
    {
        if (isset(static::$factories[$class_name])) {
            return static::$factories[$class_name];
        }
    }

    /**
     * @param string $name
     * @param array $constructor_args
     * @return mixed
     */
    public static function get($name, array $constructor_args = [])
    {
        if (!isset(static::$vars[$name]) && class_exists($name)) {
            if ($factory = static::get_factory($name)) {
                static::set($name, $factory->build());
            } elseif (!empty($constructor_args)) {
                static::set($name, new $name(...$constructor_args));
            } else {
                static::set($name, new $name);
            }
        }
        return static::$vars[$name];
    }
}