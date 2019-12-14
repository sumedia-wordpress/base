<?php

class Sumedia_Base_Admin_View_Heading extends Sumedia_Base_View
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $side_title;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $iconfile;

    /**
     * @var array
     */
    protected $options = [];

    public function __construct()
    {
        $this->set_template(Suma\ds(SUMEDIA_BASE_PATH . '/admin/templates/heading.phtml'));
        $this->set_title(__('Sumedia Plugins', SUMEDIA_BASE_PLUGIN_NAME));
        $this->set_side_title(__('Plugin Overview', SUMEDIA_BASE_PLUGIN_NAME));
        $this->set_version(SUMEDIA_BASE_PLUGIN_NAME . ' - ' . SUMEDIA_BASE_VERSION);
        $this->set_iconfile(SUMEDIA_BASE_URL . '/assets/images/wp-n-suma.png');
    }

    /**
     * @return string
     */
    public function get_title()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function set_title($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function get_side_title()
    {
        return $this->side_title;
    }

    /**
     * @param string $side_title
     */
    public function set_side_title($side_title)
    {
        $this->side_title = $side_title;
    }

    /**
     * @return string
     */
    public function get_version()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function set_version($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function get_iconfile()
    {
        return $this->iconfile;
    }

    /**
     * @param string $iconfile
     */
    public function set_iconfile($iconfile)
    {
        $this->iconfile = $iconfile;
    }

    /**
     * @return array
     */
    public function get_options()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function set_options($options)
    {
        $this->options = $options;
    }
}
