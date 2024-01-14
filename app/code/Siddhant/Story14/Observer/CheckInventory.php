<?php
namespace Siddhant\Story14\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class CheckLowInventory implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $stockItem = $observer->getEvent()->getItem();
        $threshold = 10;

        if ($stockItem->getQty() < $threshold) {
            $this->logger->info('Low inventory for product: ' . $stockItem->getProductId());
        }
    }
}