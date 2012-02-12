<?php

class Company_Brands_Model_Manager extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
      //  parent::_construct();
        $this->_init('brands/manager');
    }
}