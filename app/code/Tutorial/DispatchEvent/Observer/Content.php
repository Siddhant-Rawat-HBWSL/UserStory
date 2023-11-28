<?php
namespace Tutorial\DispatchEvent\Observer;

use Tutorial\DispatchEvent\Block\Example;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Content implements ObserverInterface {

    public function execute(Observer $observer) {
        $page = $observer->getData("page");
        
        // Parameters -> Block, Name of the block, parent
        $page->getLayout()->addBlock(Example::class, 'example_block', 'content');
    }
}
