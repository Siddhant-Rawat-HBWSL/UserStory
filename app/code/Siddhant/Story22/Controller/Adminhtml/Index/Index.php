<?php

namespace Siddhant\Story22\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;

class Index extends Action
{

    public function execute(): ResultInterface
    {
        /** @var Page $page */
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        // when we are on this page, it will have a different background for the content tab (highlighted)
        $page->setActiveMenu('Siddhant_Story22::popup');
        $page->getConfig()->getTitle()->prepend(__('Popups'));

        return $page;
    }
}
