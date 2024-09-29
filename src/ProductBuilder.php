<?php

namespace Rawlplug\Task;

class ProductBuilder {
    private int $id = 0;

    private string $name = '';

    private string $description = '';

    private float $price = 0;

    /** @var ProductAttribute[] */
    private array $attributes = [];

    public function setId(int $id): self {
        $this->id = $id;
        
        return $this;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function setDescription(string $description): self {
        $this->description = $description;

        return $this;
    }

    public function setPrice(float $price): self {
        $this->price = $price;

        return $this;
    }

    public function addAttribute(ProductAttribute $attribute): self {
        $this->attributes[] = $attribute;

        return $this;
    }

    public function build(): Product {
        $product = new Product(
            $this->id,
            $this->name,
            $this->description,
            $this->price,
            $this->attributes
        );

        $this->id = 0;
        $this->name = '';
        $this->description = '';
        $this->price = 0;
        $this->attributes = [];

        return $product;
    }
}