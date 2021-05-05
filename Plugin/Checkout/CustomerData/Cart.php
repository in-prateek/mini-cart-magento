<?php

namespace Netsmartz\Minicart\Plugin\Checkout\CustomerData;

class Cart
{

    protected $_cart;

    public function __construct(\Magento\Checkout\Model\Cart $cartModel)
    {
        $this->_cart = $cartModel;
    }

    public function afterGetSectionData(\Magento\Checkout\CustomerData\Cart $subject, array $result)
    {
        $items = $this->_cart->getQuote()->getAllItems();
        $weight = 0;
        foreach ($items as $item) {
            $weight += ($item->getWeight() * $item->getQty()) ; 
        }
        $result['weight'] = $weight;
        return $result;
    }
}
