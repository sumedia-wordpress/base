<?php

/**
 * Sumedia Base Package
 *
 * @package     Sumedia_Base
 * @copyright   Copyright (C) 2019, Sumedia - kontakt@sumedia-webdesign.de
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: Sumedia Base
 * Plugin URI:  https://github.com/sumedia-wordpress/base
 * Description: Needed by other Sumedia Wordpress Projects
 * Version:     0.1.0
 * Requires at least: 5.3 (nothing else tested yet)
 * Requires PHP: 5.3.2 (not tested, could work)
 * Author:      Sven Ullmann
 * Author URI:  https://www.sumedia-webdesign.de
 * License:     GPL v3
 * Text Domain: sumedia-base
 * Domain Path: /languages/
 * Bug Reporting: https://github.com/sumedia-wordpress/base/issues
 *
 * WC requires at least: 3.0
 * WC tested up to: 3.8
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!function_exists( 'add_filter')) {
    header( 'Status: 403 Forbidden' );
    header( 'HTTP/1.1 403 Forbidden' );
    exit();
}

if (-1 == version_compare(PHP_VERSION, '5.3.2')) {
    error_log('Sumedia: PHP Version to low');
    function sumedia_base_phpversionlow_message()
    {
        return print '<div id="message" class="error fade"><p>' . __('Your PHP version is to low for using Sumedia') . '</p></div>';
    }
    add_action('admin_notices', 'sumedia_base_phpversionlow_message');
} else {

    function sumedia_base_initialize()
    {
        if (defined('SUMEDIA_BASE_VERSION')) {
            return;
        }

        define('SUMEDIA_BASE_VERSION', '0.1.0');
        define('SUMEDIA_PLUGIN_PATH', dirname(__DIR__) . '/');
        define('SUMEDIA_PLUGIN_URL', plugin_dir_url(__DIR__));
        define('SUMEDIA_BASE_PLUGIN_NAME', dirname(plugin_basename(__FILE__)));

        require_once(SUMEDIA_PLUGIN_PATH . '/' . SUMEDIA_BASE_PLUGIN_NAME . '/inc/class-autoloader.php');
        $autoloader = Sumedia_Base_Autoloader::get_instance();
        $autoloader->register_autoload_dir(SUMEDIA_BASE_PLUGIN_NAME, 'admin/menu');
        $autoloader->register_autoload_dir(SUMEDIA_BASE_PLUGIN_NAME, 'admin/view');
        $autoloader->register_autoload_dir(SUMEDIA_BASE_PLUGIN_NAME, 'inc');
        $autoloader->register_autoloader();

        $registry = Sumedia_Base_Registry::get_instance();

        $event = new Sumedia_Base_Event(function () {
            load_plugin_textdomain(
                'sumedia-base',
                false,
                SUMEDIA_BASE_PLUGIN_NAME . '/languages/');
        });
        add_action('plugins_loaded', [$event, 'execute']);

        $view_renderer = new Sumedia_Base_View_Renderer();
        $registry->set('view_renderer', $view_renderer);
        $view_renderer->set_template(SUMEDIA_PLUGIN_PATH . SUMEDIA_BASE_PLUGIN_NAME . '/admin/templates/overview.phtml');

        $plugins = new Sumedia_Base_Admin_View_Plugins();
        $view_renderer->set('plugins', $plugins);

        $menu = new Sumedia_Base_Admin_Menu_Overview();
        $view_renderer->set('menu', $menu);

        $event = new Sumedia_Base_Event(function () {
            $registry = Sumedia_Base_Registry::get_instance();
            $view_renderer = $registry->get('view_renderer');
            $menu = $view_renderer->get('menu');

            $menu->menu_hook = add_plugins_page(
                $menu->page_title,
                $menu->build_iconified_title(),
                'manage_options',
                $menu->slug,
                [$view_renderer, 'render'],
                $menu->pos
            );
        });
        add_action('admin_menu', [$event, 'execute']);

        $event = new Sumedia_Base_Event(function(){
            $cssFile = SUMEDIA_PLUGIN_URL . SUMEDIA_BASE_PLUGIN_NAME . '/assets/css/suma-admin.css';
            wp_enqueue_style('suma_admin_style', $cssFile);
        });
        add_action('admin_print_styles', [$event, 'execute']);

    }

    sumedia_base_initialize();

}
