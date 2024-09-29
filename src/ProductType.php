<?php

namespace Rawlplug\Task;

class ProductType {
    private string $name;

    private float $priceModifier;

    public function __construct(string $name, float $priceModifier) {
        $this->name = $name;
        $this->priceModifier = $priceModifier;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPriceModifier(): string {
        return $this->priceModifier;
    }
}
