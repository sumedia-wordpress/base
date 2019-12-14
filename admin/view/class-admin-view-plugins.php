<?php

class Sumedia_Base_Admin_View_Plugins extends Sumedia_Base_View
{
    /**
     * @var array
     */
    protected $plugins = [];

    /**
     * Sumedia_Base_Admin_View_Plugins constructor.
     */
    public function __construct()
    {
        $this->set_template(Suma\ds(SUMEDIA_BASE_PATH . '/admin/templates/plugins.phtml'));
    }

    /**
     * @param $name
     * @param $plugin_data
     */
    public function add_plugin($name, $plugin_data)
    {
        $this->plugins[$name] = $plugin_data;
    }

    /**
     * @param $name
     */
    public function remove_plugin($name)
    {
        unset($this->plugins[$name]);
    }
}
