<?php

class Sumedia_Base_Admin_View_Overview extends Sumedia_Base_View
{
    public function __construct()
    {
        $this->template = SUMEDIA_PLUGIN_PATH . SUMEDIA_BASE_PLUGIN_NAME . ds('/admin/templates/overview.phtml');
    }
}