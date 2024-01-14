<?php
namespace Siddhant\UserStory\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Result\PageFactory;
use PushpakMods\Story9\Block\ShowText;

use Magento\Framework\Controller\ResultFactory;


class CustomController extends Action
{
    protected $scopeConfig;
    protected $pageFactory;
    protected $myblock;
    public function __construct(Context $context, ScopeConfigInterface $scopeConfig,PageFactory $pageFactory,ShowText $myblock)
    {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
        $this->pageFactory = $pageFactory;
        $this->myblock = $myblock;
    }

    public function execute()
    {
        $enable = $this->scopeConfig->getValue('general1/custom_settings/enable');
        $textToDisplay = $this->scopeConfig->getValue('general1/custom_settings/text_to_display');

        if ($enable == 1) {
            $this->myblock->setBlockData($textToDisplay);
        } else {
            $this->myblock->setBlockData('Feature is disabled.');
        }

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);;
    }
}

?>