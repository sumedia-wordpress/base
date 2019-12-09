<?php

class Sumedia_Base_Admin_View_Plugins extends Sumedia_Base_View
{
    public $plugins = [];

    public function __construct()
    {
        $this->template = Suma\ds(SUMEDIA_BASE_PATH . '/admin/templates/plugins.phtml');
    }
}