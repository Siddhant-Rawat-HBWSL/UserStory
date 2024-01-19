<?php

namespace Siddhant\Story22\Model\ResourceModel\Collection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Siddhant\Story22\Model\Popup;
use Siddhant\Story22\Model\ResourceModel\PopupResource;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Popup::class, PopupResource::class);
    }
}
