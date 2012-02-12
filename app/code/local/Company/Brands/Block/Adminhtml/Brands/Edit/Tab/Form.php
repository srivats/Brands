<?php
class Company_Brands_Block_Adminhtml_Brands_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('brands_form', array('legend'=>'Item information'));

        $fieldset->addField('title', 'text', array(
            'label'     =>'Name',
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name',
        ));

        if ( Mage::registry('brands_data') )
        {
            $form->setValues(Mage::registry('brands_data')->getData());
        }

        return parent::_prepareForm();
    }
}
