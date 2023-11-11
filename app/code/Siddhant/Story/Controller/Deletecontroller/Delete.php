<?php
namespace Siddhant\Story\Controller\Deletecontroller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Siddhant\Story\Model\PostFactory;

class Delete extends Action {

    protected $resultPageFactory;
    protected $postFactory;
    protected $resultRedirectFactory;

    public function __construct(\Magento\Framework\App\Action\Context $context, PageFactory $pageFactory, PostFactory $postFactory, \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $pageFactory;
        $this->postFactory = $postFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    public function execute() {
        $data = (array) $this->getRequest()->getParams();

        try {
            if($data) {
                $model = $this->postFactory->create()->load($data['id']);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('Record Deleted'));
            }
        } catch(\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('story/tablecontroller/table');
        return $resultRedirect;

        // return $this->_redirect('story/tablecontroller/table');
        // $resultRedirect = $this->resultRedirectFactory->create(ResultFactory::TYPE_REDIRECT);
        // $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        // return $resultRedirect;

        // $this->_redirect('story/tablecontroller/table');
        // $resultPage = $this->resultPageFactory->create();
        // return $resultPage;
    }
}
