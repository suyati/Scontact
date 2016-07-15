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
class Suyati_Contactforpin_Block_Adminhtml_Contactforpin extends Mage_Adminhtml_Block_Widget_Grid_Container {

    /**
     * Set custom labels and headers for the widgets
     *
     */
    public function __construct() {

        $this->_controller = "adminhtml_contactforpin";
        $this->_blockGroup = "contactforpin";
        $this->_headerText = Mage::helper("contactforpin")->__("Contact Info");
        parent::__construct();
        $this->_removeButton('add');
    }

}
