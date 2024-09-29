<?php

namespace Rawlplug\Task;

class Basket {

    /** @var Product[] */
    private array $productsInBasket = [];

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


    /**
     * Removes single product with specific id from basket
     *
     * @param Product $product
     * @return void
     */
    public function removeProduct(Product $product): void {
        
    }

    /**
     * Returns current value of a basket
     * 
     * @return float
     */
    public function checkout(): float {
        $basketValue = 0;
        foreach($this->productsInBasket as $product) {
            if($product instanceof ProductWithPromotion || $product instanceof ProductWithTypeAndPromotion) {
                $basketValue += $product->getPriceAfterDiscount();
            } else if ($product instanceof ProductWithTypes) {
                $basketValue += $product->getTypePrice();
            } else {
                $basketValue += $product->getPrice();
            }
        }

        return $basketValue;
    }
}
