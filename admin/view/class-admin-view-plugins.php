<?php

class Sumedia_Base_Admin_View_Plugins extends Sumedia_Base_View
{
    public $plugins = [];

    public function __construct()
    {
        $this->template = SUMEDIA_PLUGIN_PATH . '/' . SUMEDIA_BASE_PLUGIN_NAME . '/admin/templates/plugins.phtml';
    }
}