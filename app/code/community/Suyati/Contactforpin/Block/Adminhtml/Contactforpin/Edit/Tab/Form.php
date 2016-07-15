<?php
/*!
 * http://suyati.com/
 * Suyati_Contactforpin 1.7
 * Copyright (C) 2016, Suyati Technologies
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
*/
class Suyati_Contactforpin_Block_Adminhtml_Contactforpin_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('contactforpin_form', array('legend'=>Mage::helper('contactforpin')->__('Item information')));
       
        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('contactforpin')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
        ));

        /*$fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('contactforpin')->__('Status'),
            'name'      => 'status',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('contactforpin')->__('Active'),
                ),

                array(
                    'value'     => 0,
                    'label'     => Mage::helper('contactforpin')->__('Inactive'),
                ),
            ),
        ));*/
       
        $fieldset->addField('content', 'editor', array(
            'name'      => 'content',
            'label'     => Mage::helper('contactforpin')->__('Content'),
            'title'     => Mage::helper('contactforpin')->__('Content'),
            'style'     => 'width:98%; height:400px;',
            'wysiwyg'   => false,
            'required'  => true,
        ));
       
        if ( Mage::getSingleton('adminhtml/session')->getContactforpinData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getContactforpinData());
            Mage::getSingleton('adminhtml/session')->setContactforpinData(null);
        } elseif ( Mage::registry('contactforpin_data') ) {
            $form->setValues(Mage::registry('contactforpin_data')->getData());
        }
        return parent::_prepareForm();
    }
}