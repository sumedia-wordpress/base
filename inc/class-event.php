<?php

class Sumedia_Base_Event
{
    /**
     * @var callable
     */
    protected $callback;

    /**
     * @var string
     */
    protected $name;

    /**
     * Sumedia_Base_Event constructor.
     */
    public function __construct($callback, $name = "sumedia-event"){
        $this->callback = $callback;
        $this->name = $name;
    }

    public function execute() {
        $args = array_slice(func_get_args(), 2);
        $callback = $this->callback;
        $callback(...$args);
    }
}