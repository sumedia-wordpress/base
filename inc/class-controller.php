<?php

abstract class Sumedia_Base_Controller
{
    /**
     * @var $this
     */
    protected static $instance;

    /**
     * Sumedia_Base_Controller constructor.
     */
    protected function __construct() {}

    /**
     * @return $this
     */
    public static function get_instance()
    {
        if (null == static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function prepare(){}

    abstract public function execute();
}
