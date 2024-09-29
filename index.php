<?php

require_once __DIR__ . '/vendor/autoload.php';


use Rawlplug\Task\Basket;
use Rawlplug\Task\Product;

$r_hpt_iii = new Product(1, 'R-HPT-III', 'Kotwa opaskowa do dużych obciążeń.', 10.99);
$r_ker_ii = new Product(2, 'R-KER-II', 'Kotwa chemiczna hybrydowa do wysokich obciążeń na bazie żywicy winyloestrowej.', 20.00);
$r_kem_ii = new Product(3, 'R-KEM-II', 'Kotwa chemiczna poliestrowa bez styrenu, rekomendowana do średnich obciążeń.', 15.99);

$basket = new Basket();
$basket->addProduct($r_hpt_iii);
$basket->addProduct($r_hpt_iii);
$basket->addProduct($r_ker_ii);
$basket->addProduct($r_kem_ii);

echo 'Current basket:' . PHP_EOL;
if(empty($basket->getProductsInBasket())) {
    echo '    empty'. PHP_EOL;
}
foreach($basket->getProductsInBasket() as $basketItem) {
    echo '    ' . $basketItem->getName() . ' - ' . $basketItem->getPrice() . ' PLN - ' . $basketItem->getDescription() . PHP_EOL;
}
echo 'Checkout: ' . $basket->checkout() . ' PLN' . PHP_EOL;