<?php

class Sumedia_Base_Plugin
{
    public function init()
    {
        $this->textdomain();
        $this->view_heading();
        $this->view_plugins();
        $this->view_menu();
        $this->view_admin_stylesheet();
        $this->menu();
    }

    public function textdomain()
    {
        $event = new Sumedia_Base_Event(function () {
        load_plugin_textdomain(
            'sumedia-base',
            false,
            SUMEDIA_BASE_PLUGIN_NAME . '/languages/');
        });
        add_action('plugins_loaded', [$event, 'execute']);
    }

    public function view_heading()
    {
        $view = Sumedia_Base_Registry::get_instance('view');
        $heading = new Sumedia_Base_Admin_View_Heading();
        $view->set('sumedia_base_admin_view_heading', $heading);
    }

    public function view_plugins()
    {
        $view = Sumedia_Base_Registry::get_instance('view');
        $plugins = new Sumedia_Base_Admin_View_Plugins();
        $view->set('sumedia_base_admin_view_plugins', $plugins);
    }

    public function view_menu()
    {
        $view = Sumedia_Base_Registry::get_instance('view');
        $menu = new Sumedia_Base_Admin_View_Menu();
        $view->set('sumedia_base_admin_view_menu', $menu);
    }

    public function view_admin_stylesheet()
    {
        $event = new Sumedia_Base_Event(function(){
            $cssFile = SUMEDIA_PLUGIN_URL . SUMEDIA_BASE_PLUGIN_NAME . '/assets/css/style.css';
            wp_enqueue_style('sumedia_base_style', $cssFile);
        });
        add_action('admin_print_styles', [$event, 'execute']);
    }

    public function menu()
    {
        $event = new Sumedia_Base_Event(function () {
            $view = Sumedia_Base_Registry::get_instance('view');
            $menu = $view->get('sumedia_base_admin_view_menu');

            add_plugins_page(
                $menu->page_title,
                $menu->build_iconified_title(),
                'manage_options',
                $menu->slug,
                [$menu, 'render'],
                $menu->pos
            );
        });
        add_action('admin_menu', [$event, 'execute']);
    }
}