<?php
namespace Siddhant\UserStory\Block;

use Magento\Framework\View\Element\Template;

class CustomBlock extends Template
{
    // public function _toHtml()
    // {
    //     return '<div style="color:red;"><h1>Hello from _toHtml()</h1></div>';
    // }


    protected function _afterToHtml($html)
    {   
        $content = $this->getLayout()->getBlock('htmlblock.additionalcontent')->toHtml();

        return '<div>' . $html . '<br/>Hello from _afterToHtml()</div> ';
    }
}