<?php

require_once __DIR__ . '/vendor/autoload.php';


use Rawlplug\Task\Basket;
use Rawlplug\Task\ProductType;
use Rawlplug\Task\ProductTypes;
use Rawlplug\Task\ProductBuilder;
use Rawlplug\Task\TypeCalculating;
use Rawlplug\Task\PromotionCalculating;
use Rawlplug\Task\ProductAttribute;

$productBuilder = new ProductBuilder();
$r_hpt_iii = $productBuilder
    ->setId(1)
    ->setName('R-HPT-III')
    ->setDescription('Kotwa opaskowa do dużych obciążeń.')
    ->setPrice(10.99)
    ->build();
$r_ker_ii = $productBuilder
    ->setId(2)
    ->setName('R-KER-II')
    ->setDescription('Kotwa chemiczna hybrydowa do wysokich obciążeń na bazie żywicy winyloestrowej.')
    ->setPrice(20)
    ->build();
$r_kem_ii = $productBuilder
    ->setId(3)
    ->setName('R-KEM-II')
    ->setDescription('Kotwa chemiczna poliestrowa bez styrenu, rekomendowana do średnich obciążeń.')
    ->setPrice(15.99)
    ->build();
$r_lx = $productBuilder
    ->setId(4)
    ->setName('R-LX')
    ->setDescription('Wkręt do betonu.')
    ->setPrice(5.99)
    ->addAttribute(new ProductAttribute("promotion", 0.75))
    ->build();
$for_all = $productBuilder
    ->setId(5)
    ->setName('4ALL')
    ->setDescription('Nylonowy kołek rozporowy do wszysktich typów podłoży')
    ->setPrice(10.55)
    ->addAttribute(new ProductAttribute("types", new ProductTypes([new ProductType("Duże opakowanie", 1.2), new ProductType("Małe opakowanie", 0.8)])))
    ->build();
$uno = $productBuilder
    ->setId(6)
    ->setName('UNO')
    ->setDescription('Uniwersalny kołek rozporowy')
    ->setPrice(11.55)
    ->addAttribute(new ProductAttribute("types", new ProductTypes([new ProductType("Duże opakowanie", 1.2), new ProductType("Małe opakowanie", 0.8)])))
    ->addAttribute(new ProductAttribute("promotion", 0.8))
    ->build();

$typeCalculator = new TypeCalculating();
$promotionCalculator = new PromotionCalculating();

$basket = new Basket();
$basket->addCheckoutCalculator($typeCalculator);
$basket->addCheckoutCalculator($promotionCalculator);
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
    if($basketItem->hasAttribute('types')) {
        $type = $basketItem->getAttribute('types')->getValue()->getCurrentType();
        echo '        typ: ' . $type->getName() . ' cena: ' . $typeCalculator->computeCheckout($basketItem, $basketItem->getPrice())  . ' PLN' . PHP_EOL;
    }
    if($basketItem->hasAttribute('promotion')) {
        echo '        po przecenie: ' . $promotionCalculator->computeCheckout($basketItem, $typeCalculator->computeCheckout($basketItem, $basketItem->getPrice())) . ' PLN' . PHP_EOL;
    }
}
echo 'Checkout: ' . $basket->checkout() . ' PLN' . PHP_EOL;