<?php
namespace Tutorial\Dependency\Model;

class Injectable implements InjectableInterface {

    public function getId() {
        return "Injectable Id";
    }
}
