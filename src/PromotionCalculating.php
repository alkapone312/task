<?php

namespace Rawlplug\Task;

class PromotionCalculating implements CheckoutCalculating {

    function computeCheckout(Product $product, float $currentPrice): float {
        if($product->hasAttribute('promotion')) {
            return ceil($currentPrice * $product->getAttribute('promotion')->getValue());
        }

        return $currentPrice;
    }
}