<?php


function calculateTotal($price, $quantity) {
    return $price * $quantity;
}


$calculateTax = fn($amount) => $amount * 0.25;


$price = 100;
$quantity = 4;

$total = calculateTotal($price, $quantity);
$tax = $calculateTax($total);

echo "total cost before tax : $total<br>";
echo "tax : $tax<br>";
echo "the cost after tax : " . ($total + $tax);
