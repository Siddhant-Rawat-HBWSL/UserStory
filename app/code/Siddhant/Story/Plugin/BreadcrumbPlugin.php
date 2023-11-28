<?php
namespace Siddhant\Story\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class BreadcrumbPlugin {

    public function beforeAddCrumb(Breadcrumbs $breadcrumbs, $crumbName, $crumbInfo) {

        // $crumbName = "Hummingbird" . $crumbName;
        // dump($crumbName);
        
        $crumbInfo["label"] = "Hummingbird " . $crumbInfo["label"];
        // dump($crumbInfo);
        return [$crumbName, $crumbInfo];
    }
}
