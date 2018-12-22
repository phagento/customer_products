<?php
/**
 * @category    Phagento
 * @package  Customerproducts
 * @copyright   Copyright (c) 2018
 * @author  Joenas Ejes <joenasejes@gmail.com>
 */

class Phagento_Customerproducts_ProductController extends Mage_Core_Controller_Front_Action
{
    /**
     * Action predispatch
     *
     * Check customer authentication for some actions
     */
    public function preDispatch()
    {
        parent::preDispatch();
        $action = $this->getRequest()->getActionName();
        $loginUrl = Mage::helper('customer')->getLoginUrl();

        // Only logged-in users can access the 'My Products' page
        if (!Mage::getSingleton('customer/session')->authenticate($this, $loginUrl)) {
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }

        // Redirect to Account Dashboard if 'My Products' page is disabled
        if (!Mage::helper('phagento_customerproducts/config')->getEnable()) {
            $this->_redirect('customer/account');
            return;
        }
    }

    /**
     * Customer products
     */
    public function listAction()
    {
        $this->loadLayout();
        $this->_initLayoutMessages('catalog/session');

        $this->getLayout()->getBlock('head')->setTitle($this->__('My Products'));

        if ($block = $this->getLayout()->getBlock('customer.account.link.back')) {
            $block->setRefererUrl($this->_getRefererUrl());
        }
        $this->renderLayout();
    }
}