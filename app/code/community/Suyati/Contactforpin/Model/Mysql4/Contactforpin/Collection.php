<?php
class Suyati_Contactforpin_Model_Mysql4_Contactforpin_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
 {
     public function _construct()
     {
         parent::_construct();
         $this->_init('contactforpin/contactforpin');
     }
}