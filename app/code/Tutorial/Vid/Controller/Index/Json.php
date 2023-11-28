<?php
namespace Tutorial\Vid\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Json implements ActionInterface {

    private $jsonFactory;

    public function __construct(JsonFactory $jsonFactory) {
        $this->jsonFactory = $jsonFactory;
    }

    public function execute() {
        // 

        return $this->jsonFactory->create()
                    ->setHeader("Content-Type","application/json")
                    ->setData([
                        "name" => "Siddhant",
                        "age" => 22
                    ]);
    }
}
