<?php
namespace Siddhant\Story\Model;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel {
    protected function _construct() {
        $this->_init("Siddhant\Story\Model\ResourceModel\Resource");
    }
}
