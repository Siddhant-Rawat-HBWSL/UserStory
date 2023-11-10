<?php
namespace Siddhant\Story\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Resource extends AbstractDb {

    public function __construct(Context $context) {
        parent::__construct($context);
    }

    protected function _construct() {
        $this->_init("employee_table","id");
    }
}
