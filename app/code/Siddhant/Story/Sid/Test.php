<?php
namespace Siddhant\Story\Sid;

use Magento\Catalog\Api\Data\CategoryInterface;

class Test {

    private $category;
    private $arr;
    private $str;

    public function __construct(CategoryInterface $categoryInterface, 
                                    $arr=[1, 2, 3], $str='Siddhant\'s First Story') {
        $this->category = $categoryInterface;
        $this->arr = $arr;
        $this->str = $str;
    }

    public function displayParams() {
        echo implode(', ', $this->arr);
        echo $this->str;
    }
}
