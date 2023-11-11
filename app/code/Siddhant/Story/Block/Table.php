<?php
namespace Siddhant\Story\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Siddhant\Story\Model\ResourceModel\Collection\CollectionFactory;

class Table extends Template {

    protected $collectionFactory;

    public function __construct(Context $context, CollectionFactory $collectionFactory) {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
    }

    public function getCollection() {
        return $this->collectionFactory->create();
    }

    public function getDeleteAction() {
        return $this->getUrl("story/deletecontroller/delete");
    }
}
