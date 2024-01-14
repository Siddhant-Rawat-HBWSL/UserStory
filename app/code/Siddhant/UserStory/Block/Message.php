<?php
namespace Siddhant\UserStory\Block;

use Magento\Framework\View\Element\Template;

class Message extends Template{
    public function getMessage(){
        return "This is message from block.";
    }


    public function _afterToHtml($result){
        return $result."<br> New Line Added from afterHtml() method.";
    }
}