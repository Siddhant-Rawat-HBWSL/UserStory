<?php
namespace Siddhant\Story\Model\ResourceModel\Collection;
use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {

    protected function _construct() {
        $this->_init("Siddhant\Story\Model\Post","Siddhant\Story\Model\ResourceModel\Resource");
    }
}
