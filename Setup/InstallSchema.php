<?php
namespace WB\ContactForm\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (!$installer->tableExists('wb_contactform')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('wb_contactform')
            )
                ->addColumn(
                    'contact_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Contact ID'
                )
                ->addColumn('first_name', Table::TYPE_TEXT, 255, ['nullable' => false], 'First Name')
                ->addColumn('last_name', Table::TYPE_TEXT, 255, ['nullable' => false], 'Last Name')
                ->addColumn('email', Table::TYPE_TEXT, 255, ['nullable' => false], 'Email')
                ->addColumn('phone', Table::TYPE_TEXT, 255, ['nullable' => false], 'Phone')
                ->addColumn('subject', Table::TYPE_TEXT, 255, ['nullable' => false], 'Subject')
                ->addColumn('city', Table::TYPE_TEXT, 255, ['nullable' => false], 'City')
                ->addColumn('state', Table::TYPE_TEXT, 255, ['nullable' => false], 'State')
                ->addColumn('country', Table::TYPE_TEXT, 255, ['nullable' => false], 'Country')
                ->addColumn('message', Table::TYPE_TEXT, '2M', ['nullable' => false], 'Message')
                ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'Created At')
                ->setComment('Contact Form Table');
            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}
