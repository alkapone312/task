<?php

namespace Rawlplug\Task;

class Product {
    protected int $id;

    protected string $name;

    protected string $description;

    protected float $price;

    public function __construct(
        int $id,
        string $name,
        string $description,
        float $price
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
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

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }
}
