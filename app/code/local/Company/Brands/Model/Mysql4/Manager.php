<?php

class Company_Brands_Model_Mysql4_Manager extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('brands/manager','brands_id');
    }
}