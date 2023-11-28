<?php
namespace Tutorial\Vid\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Redirect implements ActionInterface {

    private $redirectFactory;

    public function __construct(RedirectFactory $redirectFactory) {
        $this->redirectFactory = $redirectFactory;
    }

    public function execute() {
        // Types of controllers -> Raw, PageFactory, Forward, Redirect
        
        $resultRedirect = $this->redirectFactory->create()->setUrl('/example/index/page');
        return $resultRedirect;
    }
}
