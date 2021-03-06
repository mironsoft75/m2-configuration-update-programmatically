<?php

namespace Companyname\Modulename\Setup;

use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $configWriter;

    public function __construct(WriterInterface $configWriter)
    {
        $this->configWriter = $configWriter;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->configWriter->save('shipping/origin/country_id', 'FR', 'websites', 6);
        $this->configWriter->save('shipping/origin/region_id', '183', 'websites', 6);
        $this->configWriter->save('tax/calculation/based_on', 'origin', 'websites', 6);
        $setup->endSetup();
    }
}