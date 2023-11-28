<?php
namespace Tutorial\Vid\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Page implements ActionInterface {

    protected $pageFactory;

    public function __construct(PageFactory $pageFactory) {
        $this->pageFactory = $pageFactory;
    }

    public function execute() {
        // Types of controllers -> Raw, PageFactory, Forward, Redirect

        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set("Siddhant");
        return $page;
   }
}
