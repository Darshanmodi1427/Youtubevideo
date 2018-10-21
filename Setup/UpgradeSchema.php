<?php

namespace Darsh\Video\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {

            $tableName = $setup->getTable('darsh_video');
            $connection = $setup->getConnection();
            $connection->addColumn(
                $tableName,
                'downloads_file',
                ['type' => Table::TYPE_TEXT, 'afters' => 'video_url', 'length' => 255, 'comment' => 'Downloads File']
            );
        }

        $setup->endSetup();
    }
}