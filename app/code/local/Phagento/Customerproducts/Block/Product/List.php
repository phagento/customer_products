<?php
/**
 * @category    Phagento
 * @package  Customerproducts
 * @copyright   Copyright (c) 2018
 * @author  Joenas Ejes <joenasejes@gmail.com>
 */

class Phagento_Customerproducts_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if ($this->_getConfigHelper()->getEnablePagination()) {
            $pager = $this->getLayout()->createBlock('page/html_pager', 'customer.product.list.pager');
            $pager->setShowPerPage(false);
            $pager->setLimit(($this->_canLimitCustomerProducts()) ? $this->_getProductLimit() : $this->getToolbarBlock()->getLimit());
            $pager->setCollection($this->_getProductCollection());
            $this->setChild('pager', $pager);
            $this->_getProductCollection()->load();
        }

        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function getViewSwitcherHtml()
    {
        return $this->getChildHtml('view.switcher');
    }

    /**
     * Retrieve loaded category collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getProductCollection()
    {
        if (is_null($this->_productCollection)) {
            $this->_productCollection = parent::_getProductCollection();
            $this->_addCustomerProductsFilter($this->_productCollection);
        }

        return $this->_productCollection;
    }

    /**
     * Filter products where customer_product is equal to 1 or set to 'Yes'
     *
     * @param Mage_Catalog_Model_Resource_Product_Collection $collection
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    private function _addCustomerProductsFilter(Mage_Catalog_Model_Resource_Product_Collection $collection)
    {
        $collection->addAttributeToFilter(Phagento_Customerproducts_Helper_Data::PRODUCT_ATTRIBUTE_CODE, 1);

        return $collection;
    }

    /**
     * Retrieve Toolbar block
     *
     * Set the current limit to the configurable value if it's set.
     * Else default to 10.
     *
     * @return Mage_Catalog_Block_Product_List_Toolbar
     */
    public function getToolbarBlock()
    {
        $block = parent::getToolbarBlock();
        $block->setData('_current_limit', ($this->_canLimitCustomerProducts()) ? $this->_getProductLimit() : 10);

        return $block;
    }

    /**
     * Retrieve availables view modes
     *
     * @return array
     */
    public function getModes()
    {
        return array(
            'list' => $this->__('List'),
            'slider' => $this->__('Slider'),
        );
    }

    /**
     * Retrieve current view mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->getRequest()->getParam('mode', 'list');
    }

    /**
     * Compare defined view mode with current active mode
     *
     * @param string $mode
     * @return bool
     */
    public function isModeActive($mode)
    {
        return $this->getMode() == $mode;
    }

    /**
     * Retrieve URL for view mode
     *
     * @param string $mode
     * @return string
     */
    public function getModeUrl($mode)
    {
        $urlParams = array();
        $urlParams['_current'] = true;
        $urlParams['_escape'] = true;
        $urlParams['_use_rewrite'] = true;
        $urlParams['_query'] = array('mode' => $mode, 'p' => null);

        return $this->getUrl('*/*/*', $urlParams);
    }

    /**
     * Check if limiting the products is possible
     *
     * @return bool
     */
    private function _canLimitCustomerProducts()
    {
        return ($this->_getProductLimit() > 0);
    }

    /**
     * Get the configured product limit
     *
     * @return int
     */
    private function _getProductLimit()
    {
        return $this->_getConfigHelper()->getProductLimit();
    }

    /**
     * @return Phagento_Customerproducts_Helper_Config
     */
    private function _getConfigHelper()
    {
        return Mage::helper('phagento_customerproducts/config');
    }
}