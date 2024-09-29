<?php 

namespace Rawlplug\Task;

/**
 * @template T
 */
class ProductAttribute {

    public string $name;

    /** @var T */
    public $value;

    /**
     * @param string $name
     * @param T $value
     */
    public function __construct(string $name, $value) {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string {
        return $this->name;
    }

    /**
     * @return T
     */
    public function getValue() {
        return $this->value;
    }
}