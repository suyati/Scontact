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
class Suyati_Contactforpin_Block_Adminhtml_Contactforpin_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
               
        $this->_objectId = 'id';
        $this->_blockGroup = 'contactforpin';
        $this->_controller = 'adminhtml_contactforpin';

        $this->_updateButton('save', 'label', Mage::helper('contactforpin')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('contactforpin')->__('Delete Item'));
    }

    public function getHeaderText()
    {
        if( Mage::registry('contactforpin_data') && Mage::registry('contactforpin_data')->getId() ) {
            return Mage::helper('contactforpin')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('contactforpin_data')->getTitle()));
        } else {
            return Mage::helper('contactforpin')->__('Add Item');
        }
    }
}