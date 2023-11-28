<?php
namespace Tutorial\DispatchEvent\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface {

    private $pageFactory;
    private $managerInterface;

    public function __construct(PageFactory $pageFactory, ManagerInterface $managerInterface) {
        $this->pageFactory = $pageFactory;
        $this->managerInterface = $managerInterface;
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->set('HELOOOOOO');
        $this->managerInterface->dispatch("dispatch_event_example", ["page" => $resultPage]);
        return $resultPage;
    }
}
