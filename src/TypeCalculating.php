<?php

namespace Rawlplug\Task;

class TypeCalculating implements CheckoutCalculating {
    
    function computeCheckout(Product $product, float $currentPrice): float {
        if($product->hasAttribute('types')) {
            $type = $product->getAttribute('types')->getValue()->getCurrentType();
            
            return $currentPrice * $type->getPriceModifier();
        }

        return $currentPrice;
    }
}