<?php

class Sumedia_Base_Registry
{
    /**
     * @var Sumedia_Base_Registry
     */
    protected static $instance;

    /**
     * @var array
     */
    protected $vars = [];

    /**
     * Sumedia_Base_Registry constructor.
     */
    protected function __construct()
    {
    }

    /**
     * @return Sumedia_Base_Registry
     */
    public static function get_instance($registry_key = 'default')
    {
        if (!isset(self::$instance[$registry_key])) {
            self::$instance[$registry_key] = new self();
        }
        return self::$instance[$registry_key];
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->vars[$name];
    }
}