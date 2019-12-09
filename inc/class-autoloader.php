<?php

/**
 * @copyright Sven Ullmann <kontakt@sumedia-webdesign.de>
 */

class Sumedia_Base_Autoloader
{
    /**
     * @var Sumedia_Base_Autoloader
     */
    protected static $instance;

    /**
     * @var array
     */
    protected $directories = [];

    /**
     * @var array
     */
    protected $priorities = [];

    /**
     * @var array
     */
    protected $map = [];

    protected function __construct()
    {
    }

    /**
     * @return Sumedia_Base_Autoloader
     */
    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param string $class
     */
    public function autoload($class)
    {
        if (isset($this->map[$class])) {
            require_once $this->map[$class];
            return;
        }

        $class_components = str_replace('_', '-', $class);
        $parts = explode('-', $class_components);
        do {
            $plugin = strtolower(implode('-', array_slice($parts,0, count($parts)-1)));
            array_pop($parts);
        } while (count($parts) && !isset($this->directories[$plugin]));

        if (isset($this->directories[$plugin])) {
            foreach ($this->directories[$plugin] as $dir) {
                $class_file_name = strtolower(substr($class_components, strlen($plugin)+1));
                $file = Suma\ds(SUMEDIA_PLUGIN_PATH . '/' . $plugin . '/' . $dir . '/class-' . $class_file_name . '.php');
                if (file_exists($file)) {
                    require_once $file;
                    break;
                }
            }
        }
    }

    public function register_autoloader()
    {
        spl_autoload_register([$this, 'autoload']);
    }

    /**
     * @param string $plugin
     * @param string $dir
     * @param int $priority
     */
    public function register_autoload_dir($plugin, $dir, $priority = 1000)
    {
        if (!in_array($dir, $this->directories)) {
            $this->directories[$plugin][] = $dir;
            $this->priorities[$plugin][] = $priority;
            $this->sort_directories($plugin);
        }
    }

    /**
     * @param array $map
     */
    public function register_autload_map($map)
    {
        $this->map = array_replace($this->map, $map);
    }

    protected function sort_directories($plugin)
    {
        $priorities = $this->priorities;
        foreach ($priorities as $plugin_name => $_priorities) {
            if ($plugin_name !== $plugin) {
                continue;
            }

            asort($_priorities);
            $indexes = array_keys($_priorities);
            $new_directories = [];
            foreach ($indexes as $index) {
                $new_directories[] = $this->directories[$plugin_name][$index];
            }
            $this->directories[$plugin_name] = $new_directories;
        }
    }
}