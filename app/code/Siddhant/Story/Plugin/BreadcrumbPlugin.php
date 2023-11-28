<?php
namespace Siddhant\Story\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class BreadcrumbPlugin {

    public function beforeAddCrumb(Breadcrumbs $breadcrumbs, $crumbName, $crumbInfo) {

        $crumbName = "Hummingbird" . $crumbName;
        return [$crumbName, $crumbInfo];
    }
}
