<?php
namespace Siddhant\Story17\Plugin\Catalog\Model;

use Magento\Catalog\Model\Layer;

class LayerPlugin
{
    public function aroundPrepareProductCollection(
        Layer $subject,
        \Closure $proceed,
        $collection
    ) {
        $result = $proceed($collection);

        $collection->addAttributeToSelect('rating_summary');

        return $result;
    }
}