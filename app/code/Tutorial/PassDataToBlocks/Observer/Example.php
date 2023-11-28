<?php
namespace Tutorial\PassDataToBlocks\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Example implements ObserverInterface {

    public function execute(Observer $observer) {

        $block = $observer->getBlock();
        $fullActionName = $block->getRequest()->getFullActionName();
        $blockName = $block->getNameInLayout();

        if($fullActionName === "block_data_index_index" && $blockName === "block_data") {
            $block->setLink("https://www.google.com");
        }
    }
}
