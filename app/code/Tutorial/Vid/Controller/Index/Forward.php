<?php
namespace Tutorial\Vid\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

class Forward implements ActionInterface {

    protected $forwardFactory;

    public function __construct(ForwardFactory $forwardFactory) {
        $this->forwardFactory = $forwardFactory;
    }

    public function execute() {
        // Types of controllers -> Raw, PageFactory, Forward, Redirect

        // URL remains same ('forward') but page is forwarded to the specified url 
        return $this->forwardFactory->create()->forward('page');
   }
}
