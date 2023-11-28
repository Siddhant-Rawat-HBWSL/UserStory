<?php
namespace Tutorial\PassDataToBlocks\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface {

    private $pageFactory;

    public function __construct(PageFactory $pageFactory) {
        $this->pageFactory = $pageFactory;
    }

    public function execute() {
        $resultPageFactory = $this->pageFactory->create();

        /* Magic method => setTopic()
            The Template class extends View\Element\Template, the View\Element\Template extends AbstractBlock, the AbstractBlock extends 
            Magento\Framework\DataObject and it has these in __call() method.
        */
        $resultPageFactory->getLayout()->getBlock("block_data")->setTopic("Passing data to block from controller");
        return $resultPageFactory;
    }
}
