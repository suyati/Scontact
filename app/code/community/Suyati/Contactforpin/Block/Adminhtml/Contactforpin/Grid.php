<?php

class Suyati_Contactforpin_Block_Adminhtml_Contactforpin_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('contactforpinGrid');
        // This is the primary key of the database
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('contactforpin/contactforpin')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('contactforpin')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'entity_id',
            'filter'    => false,
        ));

        $this->addColumn('name', array(
            'header'    => Mage::helper('contactforpin')->__('Name'),
            'align'     =>'left',
            'index'     => 'name',
            'filter'    => false,
        ));
        $this->addColumn('email', array(
            'header'    => Mage::helper('contactforpin')->__('Email'),
            'align'     =>'left',
            'index'     => 'email',
            'width'     => '300px',
            'filter'    => false,
        ));
        $this->addColumn('mobile', array(
            'header'    => Mage::helper('contactforpin')->__('Mobile'),
            'align'     =>'left',
            'index'     => 'mobile',
            'filter'    => false,
        ));
        $this->addColumn('location', array(
            'header'    => Mage::helper('contactforpin')->__('Location'),
            'align'     =>'left',
            'index'     => 'location',
            'filter'    => false,
        ));
        $this->addColumn('pincode', array(
            'header'    => Mage::helper('contactforpin')->__('Pincode'),
            'align'     =>'left',
            'index'     => 'pincode',
            'filter'    => false,
        ));
        /*$this->addColumn('city', array(
            'header'    => Mage::helper('contactforpin')->__('City'),
            'align'     =>'left',
            'index'     => 'city',
            'filter'    => false,
        ));*/

        /*
        $this->addColumn('content', array(
            'header'    => Mage::helper('<module>')->__('Item Content'),
            'width'     => '150px',
            'index'     => 'content',
        ));
        */

        $this->addColumn('created_date', array(
            'header'    => Mage::helper('contactforpin')->__('Creation Date'),
            'align'     => 'left',
            'width'     => '220px',
            'type'      => 'datetime',
            'filter' => false,
            'default'   => '--',
            'index'     => 'created_date',
        ));

        /*$this->addColumn('update_date', array(
            'header'    => Mage::helper('contactforpin')->__('Update Date'),
            'align'     => 'left',
            'width'     => '120px',
            'type'      => 'date',
            'default'   => '--',
            'index'     => 'update_time',
        ));   */


       $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return false;
     //   return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }


}