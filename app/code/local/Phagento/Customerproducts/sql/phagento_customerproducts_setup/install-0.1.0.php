<?php
/**
 * @category    Phagento
 * @package  Customerproducts
 * @copyright   Copyright (c) 2018
 * @author  Joenas Ejes <joenasejes@gmail.com>
 */

/* @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$attributeCode = Phagento_Customerproducts_Helper_Data::PRODUCT_ATTRIBUTE_CODE;
$eavAttr = Mage::getModel('catalog/resource_eav_attribute')->loadByCode('catalog_product', $attributeCode);

if (!$eavAttr->getId()) {
    $installer->addAttribute('catalog_product', $attributeCode, array(
        'group' => 'General',
        'label' => 'Customer Product',
        'type' => 'int',
        'default' => '0',
        'input' => 'boolean',
        'backend' => 'catalog/product_attribute_backend_boolean',
        'source' => 'eav/entity_attribute_source_boolean',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible' => true,
        'user_defined' => true,
        'is_configurable' => false,
        'searchable' => false,
        'required' => false,
        'filterable' => false,
        'comparable' => false,
        'visible_on_front' => false,
        'visible_in_advanced_search' => false,
        'unique' => false
    ));
}

$installer->endSetup();