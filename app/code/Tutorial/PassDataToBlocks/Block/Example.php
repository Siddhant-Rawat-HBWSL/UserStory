<?php
namespace Tutorial\PassDataToBlocks\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Example extends Template {

    public function __construct(Context $context) {
        parent::__construct($context);
    }
}
