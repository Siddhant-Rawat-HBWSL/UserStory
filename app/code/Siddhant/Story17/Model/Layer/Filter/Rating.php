<?php

namespace Siddhant\Story17\Model\Layer\Filter;

class Rating extends \Magento\Catalog\Model\Layer\Filter\AbstractFilter
{

    protected $_categoryId;
    protected $_appliedCategory;
    protected $_escaper;
    protected $_coreRegistry;
    private $dataProvider;

    public function __construct(
        \Magento\Catalog\Model\Layer\Filter\ItemFactory $filterItemFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\Layer $layer,
        \Magento\Catalog\Model\Layer\Filter\Item\DataBuilder $itemDataBuilder,
        \Magento\Framework\Escaper $escaper,
        array $data = []
    ) {
        parent::__construct($filterItemFactory, $storeManager, $layer, $itemDataBuilder, $data);
        $this->_escaper = $escaper;
        $this->_requestVar = 'rat';
    }

    public function getResetValue()
    {
        return $this->dataProvider->getResetValue();
    }

    public function apply(\Magento\Framework\App\RequestInterface $request)
    {

        $filter = $request->getParam($this->getRequestVar());
        if (!$filter) {
            return $this;
        }
        $filter = explode('-', $filter);
        list($from, $to) = $filter;
         $collection = $this->getLayer()->getProductCollection();

        $collection->getSelect()->joinLeft(array('rova'=> 'rating_option_vote_aggregated'),'e.entity_id =rova.entity_pk_value',array("percent"))
        ->where("rova.percent between ".$from." and ".$to)
        ->group('e.entity_id'); 
        return $this;
    }

    public function getName()
    {
        return __('Rating');
    }

    protected function _getItemsData()
    {

        $facets = array(
            '0-20'=>'1 Start',
            '21-40'=>'2 Start',
            '41-60'=>'3 Start',
            '61-80'=>'4 Start',
            '81-100'=>'5 Start'
            );
     $collection = $this->getLayer()->getProductCollection();
        $data = [];
        if (count($facets) > 1) { // two range minimum
            $i=1;
            foreach ($facets as $key => $label) {
               $count=$this->prepareData($key,$collection,$i);
               $i++;
               $this->itemDataBuilder->addItemData(
                    $this->_escaper->escapeHtml($label),
                    $key,
                    $count
                );
            }
        }

        return $this->itemDataBuilder->build();
    }

    private function prepareData($filter,$collection,$i)
    {
       $filter = explode('-', $filter);
        list($from, $to) = $filter;

        $collection->getSelect()->joinLeft(array('rova'.$i=> 'rating_option_vote_aggregated'),'e.entity_id =rova'.$i.'.entity_pk_value',array("percent"))
        ->where("rova".$i.".percent between ".$from." and ".$to)
        ->group('e.entity_id'); 
        return $collection->getSize();
    }
}