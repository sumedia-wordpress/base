<?php

class Sumedia_Base_Plugin
{
    public function init()
    {
        add_action('plugins_loaded', [$this, 'textdomain']);
        add_action('admin_print_styles', [$this, 'admin_stylesheets']);
        add_action('admin_menu', [$this, 'setup_menu']);
    }

    public function textdomain()
    {
        load_plugin_textdomain(
            'sumedia-base',
            false,
            SUMEDIA_BASE_PLUGIN_NAME . DIRECTORY_SEPARATOR . 'languages'
        );
    }

    public function admin_stylesheets()
    {
        $cssFile = SUMEDIA_BASE_URL . '/assets/css/style.css';
        wp_enqueue_style('sumedia_base_style', $cssFile);
    }

    public function setup_menu()
    {
        $menu = Sumedia_Base_Registry::get('Sumedia_Base_Admin_View_Menu');
        add_plugins_page(
            $menu->get_page_title(),
            $menu->build_iconified_title(),
            'manage_options',
            $menu->get_slug(),
            [$menu, 'render'],
            $menu->get_pos()
        );
    }
}