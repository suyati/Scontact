<?php

$installer = $this;

$installer->startSetup();

$contactsforPin = $installer->getConnection()->newTable($installer->getTable('suyati_contactforpin_details'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
        'identity' => true,
        ), 'Contactforpin id')

    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        ), 'Name')

    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        ), 'Email')
    ->addColumn('mobile', Varien_Db_Ddl_Table::TYPE_VARCHAR, 15, array(
        'nullable' => false,
        ), 'Mobile')
    ->addColumn('location', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        ), 'Location')    
    ->addColumn('pincode', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(
        'nullable' => false,
        ), 'Pincode')
    ->addColumn('city', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => true,
        ), 'City')
    ->addColumn('created_date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => false,
        ), 'Created Date')

    ->addColumn('updated_date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => true,
        'default' => null,
        ), 'Updated Date');

    $installer->getConnection()->createTable($contactsforPin);

$installer->endSetup();