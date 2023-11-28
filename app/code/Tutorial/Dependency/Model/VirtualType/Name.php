<?php
namespace Tutorial\Dependency\Model\VirtualType;

class Name {

    public function getName(string $name): string {
        return $name;
    }
}
