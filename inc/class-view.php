<?php

class Sumedia_Base_View
{
    public $template;

    public function set($name, $value)
    {
        $view = Sumedia_Base_Registry::get_instance('view');
        $view->set($name, $value);
    }

    public function get($name)
    {
        $view = Sumedia_Base_Registry::get_instance('view');
        return $view->get($name);
    }

    public function render($return = false)
    {
        if ($return) {
            ob_start();
        }
        require $this->template;
        if ($return) {
            $content = ob_get_clean();
            return $content;
        }
    }
}