<?php

class Sumedia_Base_Admin_View_Overview extends Sumedia_Base_View
{
    public function __construct()
    {
        $this->template = Suma\ds(SUMEDIA_BASE_PATH . '/admin/templates/overview.phtml');
    }
}