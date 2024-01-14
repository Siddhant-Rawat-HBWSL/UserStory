<?php

$installer->startSetup();

$table = $installer->getConnection()->newTable(
    $installer->getTable('your_custom_sales_data_table')
)->addColumn(
    'customer_group_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['nullable' => false, 'primary' => true],
    'Customer Group ID'
)->addColumn(
    'total_sales_amount',
    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
    '12,4',
    ['nullable' => false, 'default' => '0.0000'],
    'Total Sales Amount'
)->setComment(
    'Custom Sales Data Table'
);

$installer->getConnection()->createTable($table);

$installer->endSetup();