<?php
namespace Siddhant\Story\Plugin;

use \Magento\Catalog\Model\Product;

class PricePlugin {

    private $priceLessThan60 = true;

    // I think is called after the function getName() in core module
    // public function afterGetFinalPrice(Product $subject, $result) {
    //     if($result < 60) {
    //         $this->priceLessThan60 = true;
    //     }
    //     return $result;
    // }

    public function afterGetName(Product $subject, $result) {
        $res = $subject->getFinalPrice();

        if($res < 60) {
            return $result . " (On Sale!)";
        }
        return $result;
    }
}
