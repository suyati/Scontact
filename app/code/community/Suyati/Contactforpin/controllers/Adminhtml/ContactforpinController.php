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

class Suyati_Contactforpin_Adminhtml_ContactforpinController extends Mage_Adminhtml_Controller_Action 
{
    /**
     * [_isAllowed for admin group view]
     * @return boolean
     */
    protected function _isAllowed()
    {
        return true;
    }
    
    /**
     * Set active menu and Breadcrumb
     * @return \Suyati_Contactforpin_ContactforpinController
     */
    protected function _initAction() {
        $this->loadLayout()
                ->_setActiveMenu("contactforpin/contactforpin");
        return $this;
    }

	/**
     * [indexAction Contactforpin]
     * @return [type] [Contactforpin]
     */
	public function indexAction()
    {
        $this->_title($this->__("Contactforpin"));
        $this->_initAction();
        $this->renderLayout();
    
    }

    /**
     * Export order grid to CSV format
     */
    public function exportCsvAction() {
        $fileName = 'contactinformation.csv';
        $grid = $this->getLayout()->createBlock('contactforpin/adminhtml_contactforpin_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

     

}