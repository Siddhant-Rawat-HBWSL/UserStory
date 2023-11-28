<?php
namespace Tutorial\DispatchEvent\Block;

use Magento\Framework\View\Element\Template;

class Example extends Template {

    public function toHtml() {
        return "This is returned from Block";
    }
}
