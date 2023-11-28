<?php
namespace Tutorial\Dependency\Model;

class Heavy {

    private string $name;

    public function __construct() {
        $this->init();
    }

    public function init(): void {
        $this->name = "Heavyy!!!";
    }

    public function getName(): string {
        return $this->name;
    }
}
