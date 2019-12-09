<?php

class Sumedia_Base_Admin_View_Heading extends Sumedia_Base_View
{
    public $title;

    public $side_title;

    public $version;

    public $iconfile;

    public function __construct()
    {
        $this->template = Suma\ds(SUMEDIA_BASE_PATH . '/admin/templates/heading.phtml');
        $this->title = __('Sumedia Plugins', 'sumedia-base');
        $this->side_title = __('Plugin Overview', 'sumedia-base');
        $this->version = SUMEDIA_BASE_VERSION;
        $this->iconfile = SUMEDIA_BASE_URL . '/assets/images/kolibri-logo.png';
    }
}