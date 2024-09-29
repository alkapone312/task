<?php

namespace Rawlplug\Task;

use Exception;

class Product {
    protected int $id;

    protected string $name;

    protected string $description;

    protected float $price;

    protected array $attributes;

    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price,
        array $attributes
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->attributes = $attributes;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getAttributes(): array {
        return $this->attributes;
    }

    public function hasAttribute(string $name): bool {
        foreach($this->attributes as $attribute) {
            if($attribute->getName() === $name) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * @throws Exception
     */
    public function getAttribute(string $name): ProductAttribute {
        foreach($this->attributes as $attribute) {
            if($attribute->getName() === $name) {
                return $attribute;
            }
        }

        throw new Exception("Attribute not found!");
    }
}
