<?php
namespace Tutorial\ViewModelEx\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class DeliveryMessage implements ArgumentInterface {

    public function getMessage():string {
        return "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
    }
}
