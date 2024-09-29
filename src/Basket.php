<?php

namespace Rawlplug\Task;

class Basket {

    /** @var Product[] */
    private array $productsInBasket = [];

    /** @var CheckoutCalculating[] */
    private array $checkoutCalculators = [];

    /**
     * @return Product[]
     */
    public function getProductsInBasket(): array {
        return $this->productsInBasket;
    }

    /**
     * Adds product to basket
     *
     * @param Product $product
     * @return void
     */
    public function addProduct(Product $product): void {
        $this->productsInBasket[] = $product;
    }

    public function addCheckoutCalculator(CheckoutCalculating $calculator) {
        $this->checkoutCalculators[] = $calculator;
    }

    /**
     * Returns current value of a basket
     *
     * @return float
     */
    public function checkout(): float {
        $basketValue = 0;
        foreach($this->productsInBasket as $product) {
            $actualPrice = $product->getPrice();
            foreach ($this->checkoutCalculators as $calculator) {
                $actualPrice = $calculator->computeCheckout($product, $actualPrice);
            }
            $basketValue += $actualPrice;
        }

        return $basketValue;
    }
}
