<?php
namespace Siddhant\UserStory\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;
use Magento\Catalog\Model\Product;
use Magento\Framework\App\Response\Http;

class LogProductName implements ObserverInterface{

    protected $logger;
    protected $response;

    public function __construct(LoggerInterface $logger,Http $response)
    {   
        $this->logger=$logger;
        $this->response=$response;
    }


    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();


        if($product instanceof Product){
            $productName = $product->getName();
            $this->logger->info("viewed product:" . $productName);

            $html = $this->response->getBody();
            $this->logger->info("HTML content: " . $html);

        }
    }

}

?>