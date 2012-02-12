<?php

class Company_Brands_Block_Adminhtml_Brands_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function  __construct()
    {
        parent::__construct();
        $this->_objectId='brands_id';
        $this->_blockGroup='brands';
        $this->_controller="adminhtml_brands";
        $this->_updateButton('save','label','save reference');
        $this->_updateButton('delete','label','delete reference');

    }

    public function getHeaderText()
    {
       if(Mage::registry('brands_data')&& Mage::registry('brands_data')->getId())
        {
    return (Mage::registry('brands_data')->getName());
        }
        else {
            return 'Add Item';
        }
    }
}