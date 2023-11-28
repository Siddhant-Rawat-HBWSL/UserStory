<?php
namespace Tutorial\Dependency\Model;

use Magento\Framework\DataObject;

class MethodInjection {

    public function getName(DataObject $dataObject) {
        return $dataObject->getData("name");
    }
}
