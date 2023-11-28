<?php
namespace Tutorial\Dependency\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Tutorial\Dependency\Model\Main;

class DependencyBlock extends Template {

    protected $main;

    public function __construct(Context $context, Main $main) {
        parent::__construct($context);
        $this->main = $main;
    }

    public function getMain() {
        return $this->main;
    }
}
