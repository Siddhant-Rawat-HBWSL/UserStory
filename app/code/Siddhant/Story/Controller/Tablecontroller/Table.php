<?php
namespace Siddhant\Story\Controller\Tablecontroller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Table extends Action {

    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
