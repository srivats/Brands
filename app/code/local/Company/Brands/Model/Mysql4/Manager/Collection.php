<?php

class Company_Brands_Model_Mysql4_Manager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('brands/manager');
    }
}