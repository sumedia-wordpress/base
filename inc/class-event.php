<?php

class Sumedia_Base_Event
{
    /**
     * @var callable
     */
    protected $callback;

    /**
     * Sumedia_Base_Event constructor.
     */
    public function __construct($callback){
        $this->callback = $callback;
    }

    public function execute() {
        $args = array_slice(func_get_args(), 2);
        $callback = $this->callback;
        $callback(...$args);
    }
}