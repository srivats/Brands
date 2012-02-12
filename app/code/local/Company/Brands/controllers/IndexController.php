<?php

class Company_Brands_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){
    echo "index action";
    }

    public function brandsAction()
    {
        $brands=Mage::getModel('brands/manager')->getCollection();
        foreach($brands as $brand)
        {
            echo $brand->getName();
        }
    }
}