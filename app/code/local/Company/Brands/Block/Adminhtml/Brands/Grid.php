<?php

class Company_Brands_Block_Adminhtml_Brands_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('brandsId');
        $this->setDefaultSort('brands_id');  //database primary key
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection=Mage::getModel('brands/manager')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('brands_id',
            array(
                    'header'=>'ID',
                    'align'=>'left',
                    'width'=>'50px',
                    'index'=>'brands_id',
            ));

        $this->addColumn('name',
            array(
                'header'=>'Name',
                'align'=>'left',
                'width'=>'50px',
                'index'=>'name',
            ));

        return parent::_prepareColumns();

    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}