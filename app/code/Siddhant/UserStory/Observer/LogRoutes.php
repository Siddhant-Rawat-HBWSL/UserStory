<?php 
namespace Siddhant\UserStory\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\RouterList;

class LogRoutes implements ObserverInterface{
    protected $logger;
    protected $routerList;

    public function __construct(
        LoggerInterface $logger,
        RouterList $routerList
    ) {
        $this->logger = $logger;
        $this->routerList = $routerList;
    }

    public function execute(Observer $observer)
    {
        $routerNames = [];

        foreach ($this->routerList as $router) {
            $routerNames[] = get_class($router);
        }

        $this->logger->info("Available Routers: " . implode(', ', $routerNames));
    }
}


?>