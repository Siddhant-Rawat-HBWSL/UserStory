<?php
namespace Tutorial\Dependency\Model;

use Magento\Framework\DataObject;
use Tutorial\Dependency\Model\NonInjectableInterfaceFactory;
use Tutorial\Dependency\Model\VirtualType\DefaultName;

class Main {

    private $arr;
    private $injectable;
    private $nonInjectableFactory;
    private $abstractUtil;
    private $heavy;
    private $defaultName;
    private $optional;
    private $methodInjection;

    public function __construct(InjectableInterface $injectable ,NonInjectableInterfaceFactory $nonInjectableFactory ,
                                AbstractUtil $abstractUtil ,Heavy $heavy ,DefaultName $defaultName ,Optional $optional = null, 
                                MethodInjection $methodInjection ,array $arr = []) {
        $this->arr = $arr;
        $this->injectable = $injectable;
        $this->nonInjectableFactory = $nonInjectableFactory;
        $this->abstractUtil = $abstractUtil;
        $this->heavy = $heavy;
        $this->defaultName = $defaultName;
        $this->optional = $optional;
        $this->methodInjection = $methodInjection;
    }

    public function getId() {
        return $this->arr["id"];
    }

    public function getInjectable() {
        return $this->injectable;
    }

    public function getNonInjectable() {
        return $this->nonInjectableFactory->create();
    }

    public function getAbstractUtil() {
        return $this->abstractUtil;
    }

    public function getHeavy() {
        return $this->heavy;
    }

    public function getDefaultName() {
        return $this->defaultName;
    }

    public function getOptional() {
        return $this->optional;
    }

    public function getMethodInjection() {
        $dataObject = new DataObject(["name" => "Method Injection"]);
        return $this->methodInjection;
    }
}
