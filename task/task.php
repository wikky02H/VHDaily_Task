<?php
// task:b
$number_1 = 12;
switch ($number_1) {
    case $number_1 % 3 == 0 && $number_1 % 5 == 0:
        echo "Foo & Bar";
        break;
    case $number_1 % 3 == 0:
        echo "Foo";
        break;
    case $number_1 % 5 == 0:
        echo "Bar";
        break;

    default:
        echo "Neither Foo nor Bar";
}	

// task:c
$condition = true;

$value_1 = 50;
$value_2 = 25;
 
$result = $condition ? $value_1 + $value_2 : $value_1 - $value_2;

echo $result;

