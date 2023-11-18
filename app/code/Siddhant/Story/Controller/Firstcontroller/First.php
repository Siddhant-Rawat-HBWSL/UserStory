<?php
namespace Siddhant\Story\Controller\Firstcontroller;

use Siddhant\Story\Sid\Test;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class First extends Action {

    protected $resultPageFactory;
    private $test;
    public function __construct(\Magento\Framework\App\Action\Context $context , PageFactory $resultPageFactory, Test $test) {
        $this->resultPageFactory = $resultPageFactory;
        $this->test = $test;
        parent::__construct($context);
    }

    public function execute() {
        $this->test->displayParams();

        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
