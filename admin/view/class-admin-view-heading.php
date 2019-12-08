<?php

class Sumedia_Base_Admin_View_Heading extends Sumedia_Base_View
{
    public $title;

    public $side_title;

    public $version;

    public $iconfile;

    public function __construct()
    {
        $this->template = Suma\ds(SUMEDIA_PLUGIN_PATH . '/' . SUMEDIA_BASE_PLUGIN_NAME . '/admin/templates/heading.phtml');
        $this->title = __('Sumedia Plugins', 'sumedia-base');
        $this->side_title = __('Plugin Overview', 'sumedia-base');
        $this->version = SUMEDIA_BASE_VERSION;
        $this->iconfile = SUMEDIA_PLUGIN_URL . '/' . SUMEDIA_BASE_PLUGIN_NAME . '/assets/images/kolibri-logo.png';
    }
}