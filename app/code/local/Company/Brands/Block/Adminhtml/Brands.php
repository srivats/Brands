<?php

class Company_Brands_Block_Adminhtml_Brands extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller="adminhtml_brands"; //block name
        $this->_blockGroup="brands";
        $this->_headerText="Manage Brands";
        $this->_addButtonLabel="Add Brand";
        parent::__construct();

    }
}