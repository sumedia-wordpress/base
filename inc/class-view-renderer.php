<?php

class Sumedia_Base_View_Renderer
{
    protected $vars;

    protected $template;

    public function set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function get($name)
    {
        return $this->vars[$name];
    }

    public function set_template($template)
    {
        $this->template = $template;
    }

    public function get_template()
    {
        return $this->template;
    }

    public function render()
    {
        require $this->get_template();
    }
}