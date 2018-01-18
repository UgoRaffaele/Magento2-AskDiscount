<?php

namespace UgoRaffaele\AskDiscount\Block\Catalog\Product\View;

class AskDiscountbutton extends \Magento\Framework\View\Element\Template
{
	protected $scopeConfig;
	protected $registry;
	
	public function __construct(
	\Magento\Framework\View\Element\Template\Context $context,
	\Magento\Framework\Registry $registry
	){
		$this->scopeConfig = $context->getScopeConfig();
		$this->registry  = $registry;
		parent::__construct($context);
	}
	
	public function isModuleEnabled()
	{
		$moduleEnabled=$this->scopeConfig->getValue('askdiscount/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $moduleEnabled;
	}
	
	public function getProductId()
	{
		return $this->registry->registry('current_product')->getId();
	}
	
	public function isAskDiscountEnabledForProduct()
	{
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$product = $objectManager->get('Magento\Catalog\Model\Product')->load($this->getProductId());
		return (boolean) $product->getAskDiscount();
	}
	
}
