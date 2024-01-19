<?php

namespace Siddhant\Story22\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PopupResource extends AbstractDb
{

    private const TABLE_NAME = "Story22_Popup";
    private const ID = "popup_id";

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::ID);
    }
}
