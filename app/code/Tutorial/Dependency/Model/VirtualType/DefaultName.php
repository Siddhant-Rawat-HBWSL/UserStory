<?php
namespace Tutorial\Dependency\Model\VirtualType;

class DefaultName {

    public $name;

    public function __construct(Name $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name->getName('Default Name');
    }
}
