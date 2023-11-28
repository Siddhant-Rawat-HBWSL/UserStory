<?php
namespace Siddhant\Story\Sid;

use Magento\Catalog\Api\Data\CategoryInterface;
use Psr\Log\LoggerInterface;

class Test {

    private $category;
    private $arr;
    private $str;
    private $logger;

    public function __construct(CategoryInterface $categoryInterface, LoggerInterface $loggerInterface, $arr, $str) {
        $this->category = $categoryInterface;
        $this->arr = $arr;
        $this->str = $str;
        $this->logger = $loggerInterface;
    }

    public function displayParams() {
        echo implode(', ', $this->arr);
        echo $this->str;

        $serialized = serialize($this->arr);
        $this->logger->info($serialized);
    }
}
