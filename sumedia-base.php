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
 * Version:     0.1.1
 * Requires at least: 5.3 (nothing else tested yet)
 * Requires PHP: 5.6.0 (not tested, could work)
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



if (-1 == version_compare(PHP_VERSION, '5.6.0')) {
    error_log('Sumedia: PHP Version to low');
    function sumedia_base_phpversionlow_message()
    {
        return print '<div id="message" class="error fade"><p>' . __('Your PHP version is to low for using Sumedia') . '</p></div>';
    }
    add_action('admin_notices', 'sumedia_base_phpversionlow_message');
} else {

    define('SUMEDIA_BASE_VERSION', '0.1.1');
    if (!defined('SUMEDIA_PLUGIN_PATH')) {
        define('SUMEDIA_PLUGIN_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
    }
    if (!defined('SUMEDIA_PLUGIN_URL')) {
        define('SUMEDIA_PLUGIN_URL', plugin_dir_url(__DIR__));
    }
    if (!defined('SUMEDIA_BASE_INLCUDING_PLUGIN')) {
        define('SUMEDIA_BASE_INLCUDING_PLUGIN', basename(__DIR__));
    }
    if (!defined('SUMEDIA_BASE_PATH')) {
        define('SUMEDIA_BASE_PATH', dirname(__FILE__) . str_replace('/', DIRECTORY_SEPARATOR, '/vendor/sumedia-wordpress/base'));
    }
    if (!defined('SUMEDIA_BASE_URL')) {
        define('SUMEDIA_BASE_URL', SUMEDIA_PLUGIN_URL . SUMEDIA_BASE_INLCUDING_PLUGIN . '/vendor/sumedia-wordpress/base');
    }
    define('SUMEDIA_BASE_PLUGIN_NAME', 'sumedia-base');

    require_once(__DIR__ . str_replace('/', DIRECTORY_SEPARATOR, '/inc/functions.php'));

    require_once(__DIR__ . Suma\ds('/inc/class-autoloader.php'));
    $autoloader = Sumedia_Base_Autoloader::get_instance();
    $autoloader->register_autoloader();
    $autoloader->register_autload_map([
        'Sumedia_Base_Admin_View_Heading' => __DIR__ . Suma\ds('/admin/view/class-admin-view-heading.php'),
        'Sumedia_Base_Admin_View_Menu' => __DIR__ . Suma\ds('/admin/view/class-admin-view-menu.php'),
        'Sumedia_Base_Admin_View_Overview' => __DIR__ . Suma\ds('/admin/view/class-admin-view-overview.php'),
        'Sumedia_Base_Admin_View_Plugins' => __DIR__ . Suma\ds('/admin/view/class-admin-view-plugins.php'),
        'Sumedia_Base_Autoloader' => __DIR__ . Suma\ds('/inc/class-autoloader.php'),
        'Sumedia_Base_Event' => __DIR__ . Suma\ds('/inc/class-event.php'),
        'Sumedia_Base_Plugin' => __DIR__ . Suma\ds('/inc/class-plugin.php'),
        'Sumedia_Base_Registry' => __DIR__ . Suma\ds('/inc/class-registry.php'),
        'Sumedia_Base_View' => __DIR__ . Suma\ds('/inc/class-view.php'),
    ]);

    add_action('plugins_loaded', 'sumedia_base_textdomain');
    function sumedia_base_textdomain()
    {
        load_plugin_textdomain(
            'sumedia-base',
            false,
            SUMEDIA_BASE_PLUGIN_NAME . DIRECTORY_SEPARATOR . 'languages');
    }

    add_action('init', 'sumedia_base_init', 1);
    function sumedia_base_init()
    {
        $plugin = new Sumedia_Base_Plugin();
        $plugin->init();
    }
}
