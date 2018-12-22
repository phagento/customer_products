<?php
/**
 * @category    Phagento
 * @package  Customerproducts
 * @copyright   Copyright (c) 2018
 * @author  Joenas Ejes <joenasejes@gmail.com>
 */

class Phagento_Customerproducts_Helper_Config extends Mage_Core_Helper_Abstract
{
    const XML_PATH_TO_PHAGENTO_CUSTOMER_PRODUCTS_GENERAL_ENABLE = 'phagento_customerproducts/general/enable';
    const XML_PATH_TO_PHAGENTO_CUSTOMER_PRODUCTS_GENERAL_PRODUCT_LIMIT = 'phagento_customerproducts/general/product_limit';
    const XML_PATH_TO_PHAGENTO_CUSTOMER_PRODUCTS_GENERAL_ENABLE_PAGINATION = 'phagento_customerproducts/general/enable_pagination';

    /**
     * @return mixed
     */
    public function getEnable()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_TO_PHAGENTO_CUSTOMER_PRODUCTS_GENERAL_ENABLE);
    }

    /**
     * @return int
     */
    public function getProductLimit()
    {
        return (int)Mage::getStoreConfig(self::XML_PATH_TO_PHAGENTO_CUSTOMER_PRODUCTS_GENERAL_PRODUCT_LIMIT);
    }

    /**
     * @return mixed
     */
    public function getEnablePagination()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_TO_PHAGENTO_CUSTOMER_PRODUCTS_GENERAL_ENABLE_PAGINATION);
    }
}