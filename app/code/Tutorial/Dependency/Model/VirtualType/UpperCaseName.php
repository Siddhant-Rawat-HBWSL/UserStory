<?php
namespace Tutorial\Dependency\Model\VirtualType;

class UpperCaseName extends Name {

    public function getName(string $name): string {
        return strtoupper(parent::getName($name));
    }
}
