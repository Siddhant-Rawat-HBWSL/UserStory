<?php
namespace Tutorial\AddRemoveBlocks\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class Example implements ObserverInterface
{

    public function execute(Observer $observer) {
        $layout = $observer->getLayout();

        if($observer->getFullActionName() == "catalog_product_view") {
            $block = $layout->getBlock("view.addto.compare");
        }

        if($block) {
            $layout->unsetElement($block->getNameInLayout());
        }
    }
}
