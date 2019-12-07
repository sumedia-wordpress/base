<?php

class Sumedia_Base_Admin_View_Plugins
{
    protected $plugins = [];

    public function set_plugin($pluginName, $data)
    {
        $this->plugins[$pluginName] = $data;
    }

    public function get_plugins()
    {
        return $this->plugins;
    }
}