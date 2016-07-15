<?php
class Suyati_Contactforpin_Model_Mysql4_Contactforpin extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('contactforpin/contactforpin', 'entity_id');
    }
}