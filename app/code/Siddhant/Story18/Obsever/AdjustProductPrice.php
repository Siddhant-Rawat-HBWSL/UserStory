<?php
namespace Siddhant\Story18\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AdjustProductPrice implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $price = $product->getPrice() + 1.79;
        $product->setPrice($price);
    }
}