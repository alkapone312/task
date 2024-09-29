<?php

namespace Rawlplug\Task;

class ProductWithPromotion extends Product {

    protected float $promotionFactor;

    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price,
        float $promotionFactor
    ) {
        parent::__construct($id, $name, $description, $price);
        $this->promotionFactor = $promotionFactor;
    }

    public function getPriceAfterDiscount(): float {
        return ceil($this->promotionFactor * $this->getPrice());
    }
}
