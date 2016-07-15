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
class Suyati_Contactforpin_Block_Adminhtml_Contactforpin_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('contactforpin_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('contactforpin')->__('News Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('contactforpin')->__('Item Information'),
            'title'     => Mage::helper('contactforpin')->__('Item Information'),
            'content'   => $this->getLayout()->createBlock('contactforpin/adminhtml_contactforpin_edit_tab_form')->toHtml(),
        ));
       
        return parent::_beforeToHtml();
    }
}