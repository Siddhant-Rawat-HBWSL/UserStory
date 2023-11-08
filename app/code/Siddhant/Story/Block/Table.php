<?php
namespace Siddhant\Story\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;

class Table extends Template {

    public function __construct(Context $context) {
        parent::__construct($context);
    }
}
