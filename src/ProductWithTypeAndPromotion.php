<?php

namespace Rawlplug\Task;

class ProductWithTypeAndPromotion extends ProductWithTypes {

    protected float $promotionFactor;

    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price,
        array $types,
        float $promotionFactor
    ) {
        parent::__construct($id, $name, $description, $price, $types);
        $this->promotionFactor = $promotionFactor;
    }

    public function getPriceAfterDiscount(): float {
        return ceil($this->promotionFactor * $this->getTypePrice());
    }
}
