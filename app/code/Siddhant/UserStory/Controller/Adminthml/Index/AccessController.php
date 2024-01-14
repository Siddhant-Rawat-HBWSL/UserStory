<?php 
namespace Siddhant\UserStory\Controller\Adminhtml\Access;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class AccessController extends Action{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {

        echo "Displayed in admin side";

    }
}


?>