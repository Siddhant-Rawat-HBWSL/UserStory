<?php
namespace Tutorial\ViewModelEx\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Stock implements ArgumentInterface {

    public function getStatus() {
        $stock = random_int(1,10);

        if($stock < 6) {
            return "Ending Soon";
        }

        return sprintf("%d Available", $stock);
    }
}
