<?php
namespace Tutorial\Dependency\Model;

class NonInjectable implements NonInjectableInterface {

    public function getId() {
        return "Non-Injectable Id";
    }
}
