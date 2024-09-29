<?php

namespace Rawlplug\Task;

use Exception;

class ProductTypes {
    /** @var ProductType[] */
    private array $types;

    private ProductType $currentType;

    /**
     * @throws Exception
     */

    public function __construct(array $types) {
        if(count($types) < 2) {
            throw new Exception("Product should have at least 2 types");
        }

        $this->types = $types;
        $this->currentType = $types[0];
    }

    /**
     * @throws Exception
     */
    public function setCurrentType(ProductType $type) {
        if(!in_array($type, $this->types)) {
            throw new Exception("Product type does not exist");
        }

        $this->currentType = $type;
    }

    public function getTypes(): array {
        return $this->types;
    }

    public function getCurrentType(): ProductType {
        return $this->currentType;
    }
}