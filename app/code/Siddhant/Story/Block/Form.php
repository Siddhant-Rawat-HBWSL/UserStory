<?php
namespace Siddhant\Story\Block;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Siddhant\Story\Model\PostFactory;

class Form extends Template {

    protected $request;
    protected $postFactory;
    protected $messageManager;

    public function __construct(Context $context, RequestInterface $request, PostFactory $postFactory, ManagerInterface $messageManager) {
        parent::__construct($context);
        $this->request = $request;
        $this->postFactory = $postFactory;
        $this->messageManager = $messageManager;
    }

    public function getPost() {
        $data = (array) $this->request->getPostValue();

        try {
            if($data) {
                $model = $this->postFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data added successfully"));
            }
        } catch(\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }

    public function actionUrl() {
        return $this->getUrl('story/tablecontroller/table');
    }
}
