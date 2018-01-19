<?php
namespace UgoRaffaele\AskDiscount\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
	
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }
	
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
		
		$installer = $setup;
		
		$installer->startSetup();
		
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'ask_discount',
			[
				'group' => 'General',
				'type' => 'int',
				'label' => 'AskDiscount',
				'input' => 'boolean',
				'class' => '',
				'source' => 'Magento\Catalog\Model\Product\Attribute\Source\Boolean',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'backend' => 'Magento\Catalog\Model\Product\Attribute\Backend\Boolean',
				'frontend' => '',
				'visible' => true,
				'required' => true,
				'user_defined' => true,
				'default' => '0',
				'sort_order' => 100,
				'is_used_in_grid' => false,
				'is_visible_in_grid' => false,
				'is_filterable_in_grid' => false
			]
		);
		
		$installer->endSetup();
		
    }
}