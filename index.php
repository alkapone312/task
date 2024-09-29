<?php

require_once __DIR__ . '/vendor/autoload.php';


use Rawlplug\Task\Basket;
use Rawlplug\Task\Product;
use Rawlplug\Task\ProductWithPromotion;
use Rawlplug\Task\ProductWithTypeAndPromotion;
use Rawlplug\Task\ProductWithTypes;
use Rawlplug\Task\ProductType;

$r_hpt_iii = new Product(1, 'R-HPT-III', 'Kotwa opaskowa do dużych obciążeń.', 10.99);
$r_ker_ii = new Product(2, 'R-KER-II', 'Kotwa chemiczna hybrydowa do wysokich obciążeń na bazie żywicy winyloestrowej.', 20.00);
$r_kem_ii = new Product(3, 'R-KEM-II', 'Kotwa chemiczna poliestrowa bez styrenu, rekomendowana do średnich obciążeń.', 15.99);
$r_lx = new ProductWithPromotion(4, 'R-LX', 'Wkręt do betonu.', 5.99, 0.75);
$for_all = new ProductWithTypes(5, '4ALL', 'Nylonowy kołek rozporowy do wszysktich typów podłoży', 10.55, [new ProductType("Duże opakowanie", 1.2), new ProductType("Małe opakowanie", 0.8)]);
$uno = new ProductWithTypeAndPromotion(5, 'UNO', 'Uniwersalny kołek rozporowy', 11.55, [new ProductType("Duże opakowanie", 1.2), new ProductType("Małe opakowanie", 0.8)], 0.8);

$basket = new Basket();
$basket->addProduct($r_hpt_iii);
$basket->addProduct($r_hpt_iii);
$basket->addProduct($r_ker_ii);
$basket->addProduct($r_kem_ii);
$basket->addProduct($r_lx);
$basket->addProduct($for_all);
$basket->addProduct($uno);

echo 'Current basket:' . PHP_EOL;
if(empty($basket->getProductsInBasket())) {
    echo '    empty'. PHP_EOL;
}
foreach($basket->getProductsInBasket() as $basketItem) {
    echo '    ' . $basketItem->getName() . ' - ' . $basketItem->getPrice() . ' PLN - ' . $basketItem->getDescription() . PHP_EOL;
    if($basketItem instanceof ProductWithTypes) {
        $type = $basketItem->getTypes()[0];
        echo '        typ: ' . $type->getName() . ' cena: ' . $basketItem->getTypePrice() . ' PLN' . PHP_EOL;
    }
    if($basketItem instanceof ProductWithPromotion || $basketItem instanceof ProductWithTypeAndPromotion) {
        echo '        po przecenie: ' . $basketItem->getPriceAfterDiscount() . ' PLN' . PHP_EOL;
    }
}
echo 'Checkout: ' . $basket->checkout() . ' PLN' . PHP_EOL;