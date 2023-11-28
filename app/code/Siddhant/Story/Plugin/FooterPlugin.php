<?php
namespace Siddhant\Story\Plugin;

use Magento\Theme\Block\Html\Footer;

class FooterPlugin {

    public function afterGetCopyright(Footer $subject, $result) {
        return "Edited";
    }
}
