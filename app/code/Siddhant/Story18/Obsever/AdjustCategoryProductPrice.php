<?php
namespace Siddhant\Story18\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AdjustCategoryProductPrice implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $collection = $observer->getEvent()->getCollection();
        foreach ($collection as $product) {
            $price = $product->getPrice() + 1.79;
            $product->setPrice($price);
        }
    }
}