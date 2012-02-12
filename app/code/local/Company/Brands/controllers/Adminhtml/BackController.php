<?php

class Company_Brands_Adminhtml_BackController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction();
       $this->_addContent($this->getLayout()->createBlock('brands/adminhtml_brands'));
        $this->renderLayout();
    }

    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('brands/manager')
            ->_addBreadcrumb('Brands','Brands');
        return $this;
    }

    public function editAction()
    {
        $brandsId     = $this->getRequest()->getParam('id');
        $brandsModel  = Mage::getModel('brands/manager')->load($brandsId);

        if ($brandsModel->getId() || $brandsId == 0) {

            Mage::register('brands_data', $brandsModel);

            $this->loadLayout();
            $this->_setActiveMenu('brands/items');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), 'Item Manager');
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), 'Item News');

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('brands/adminhtml_brands_edit'))
                ->_addLeft($this->getLayout()->createBlock('brands/adminhtml_brands_edit_tabs'));

            $this->renderLayout();
        } else {
        Mage::getSingleton('adminhtml/session')->addError('Item does not exist');
        $this->_redirect('*/*/');
    }
    }

    public function saveAction()
    {
        if ( $this->getRequest()->getPost() ) {
            try {
                $postData = $this->getRequest()->getPost();
                $brandsModel = Mage::getModel('brands/manager');

                $brandsModel->setBrandsId($this->getRequest()->getParam('id'))
                    ->setName($postData['name'])
                    ->save();

                Mage::getSingleton('adminhtml/session')->addSuccess('Brand was successfully saved');
                Mage::getSingleton('adminhtml/session')->setBrandsData(false);

                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setBrandsData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

}


