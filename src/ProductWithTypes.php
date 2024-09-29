<?php 

namespace Rawlplug\Task;

use Exception;

class ProductWithTypes extends Product {
    /** @var ProductType[] */
    private array $types = [];

    private ProductType $currentType;

    /**
     * @param ProductType[] $types
     * @throws Exception
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price,
        array $types
    ) {
        parent::__construct($id, $name, $description, $price);
        $this->types = $types;
        if(count($this->types) < 2) {
            throw new Exception("Product should have at least 2 types");
        }
        $this->currentType = $types[0];
    }

    public function getTypes(): array {
        return $this->types;
    }

    public function getTypePrice() {
        return $this->getPrice() * $this->currentType->getPriceModifier();
    }

    /**
     * @throws Exception
     */
    public function setType(ProductType $type) {
        if(!in_array($type, $this->types)) {
            throw new Exception("Product type does not exist");
        }

        $this->currentType = $type;
    }
}
