<?php

class Sumedia_Base_Admin_View_Menu extends Sumedia_Base_Admin_View_Overview
{
    public $page_title = 'Sumedia Plugins';

    public $menu_title = 'Sumedia Plugins';

    public $icon_file = SUMEDIA_BASE_URL . '/assets/images/kolibri-icon-x32.png';

    public $slug = 'sumedia';

    public $pos = 5;

    public function build_iconified_title()
    {
        return '<img style="float:left;" height="16" src="' . $this->icon_file . '" alt="Sumedia" /> ' . $this->menu_title;
    }
}
