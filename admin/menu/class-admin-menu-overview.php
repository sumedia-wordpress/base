<?php

class Sumedia_Base_Admin_Menu_Overview
{
    /**
     * @var string
     */
    public $page_title = 'Sumedia Plugins';

    /**
     * @var string
     */
    public $menu_title = 'Sumedia Plugins';

    /**
     * @var string
     */
    public $icon_file = 'assets/images/kolibri-icon-x32.png';

    /**
     * @var string
     */
    public $menu_title_second_line = 'www.sumaweb.de';

    /**
     * @var string
     */
    public $slug = 'sumedia';

    /**
     * @var int
     */
    public $pos = 5;

    /**
     * @var string
     */
    public $menu_hook;

    public function build_iconified_title()
    {
        return '<img style="float:left;" height="16" src="' . SUMEDIA_PLUGIN_URL . 'sumedia-base/' . $this->icon_file . '" alt="Sumedia" />' . $this->menu_title . '<br />';
    }
}
