<?php
namespace PushpakMods\Story17\Block\Navigation\Filter;

use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\View\Element\Template;
use Magento\LayeredNavigation\Block\Navigation\FilterRenderer;

class Rating extends Template
{
    protected $_resolver;
    protected $_filterRenderer;

    public function __construct(
        Template\Context $context,
        Resolver $resolver,
        FilterRenderer $filterRenderer,
        array $data = []
    ) {
        $this->_resolver = $resolver;
        $this->_filterRenderer = $filterRenderer;
        parent::__construct($context, $data);
    }

    public function getFilters()
    {
        $filters = [];
        $layer = $this->_resolver->get();
        $filterList = $layer->getFilterList();

        foreach ($filterList as $filter) {
            if ($filter->getRequestVar() == 'rating_summary') {
                $filters[] = $filter;
            }
        }

        return $filters;
    }
}