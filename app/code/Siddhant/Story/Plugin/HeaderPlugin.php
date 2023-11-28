<?php
namespace Siddhant\Story\Plugin;

use Magento\Theme\Block\Html\Header;

class HeaderPlugin {

    public function afterGetWelcome(Header $subject, $result) {
        return "Edited";
    }
}
