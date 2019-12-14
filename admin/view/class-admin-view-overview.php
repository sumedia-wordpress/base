<?php

class Sumedia_Base_Admin_View_Overview extends Sumedia_Base_View
{
    /**
     * @var Sumedia_Base_Admin_View_Heading
     */
    protected $heading_view;

    /**
     * @var Sumedia_Base_Admin_View_Overview
     */
    protected $content_view;

    public function __construct()
    {
        $this->set_template(Suma\ds(SUMEDIA_BASE_PATH . '/admin/templates/overview.phtml'));
        $this->set_heading_view(Sumedia_Base_Registry_View::get('Sumedia_Base_Admin_View_Heading'));
        $this->set_content_view(Sumedia_Base_Registry_View::get('Sumedia_Base_Admin_View_Plugins'));
    }

    /**
     * @return Sumedia_Base_Admin_View_Heading
     */
    public function get_heading_view()
    {
        return $this->heading_view;
    }

    /**
     * @param Sumedia_Base_Admin_View_Heading $heading_view
     */
    public function set_heading_view($heading_view)
    {
        $this->heading_view = $heading_view;
    }

    /**
     * @return Sumedia_Base_Admin_View_Overview
     */
    public function get_content_view()
    {
        return $this->content_view;
    }

    /**
     * @param Sumedia_Base_Admin_View_Overview $content_view
     */
    public function set_content_view($content_view)
    {
        $this->content_view = $content_view;
    }
}