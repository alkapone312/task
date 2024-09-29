<?php

namespace Rawlplug\Task;

interface CheckoutCalculating {
    /**
     * Takes as an arguments current product and price computed by
     * earlier calculators, returns product price based on args.
     */
    function computeCheckout(Product $product, float $currentPrice): float;
}