<?php
namespace Tutorial\Vid\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Index implements ActionInterface {

    private $rawFactory;
    public function __construct(RawFactory $rawFactory) {
        $this->rawFactory = $rawFactory;
    }

    public function execute() {
        // die('Example');

        // Types of controllers -> Raw, PageFactory, Forward, Redirect

        // return $this->rawFactory->create()->setContents("Hiiiiiiiiiiii");

        // XML in raw
        return $this->rawFactory->create()
                    ->setHeader("Content-Type", "text/xml")
                    ->setContents('<root><name>Siddhant</name><age>22</age></root>');
    }
}
