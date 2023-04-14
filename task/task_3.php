<?php

// task=1
$count = 0;
for ($i = 0; $i <= 9; $i++) {
    $count++;
    echo "This is loop number: $count\n";
}

// task:2
$num_1 = 10;
$num_2 = 20;
$sum = $num_1 + $num_2;
 while($sum <= 50){
    $num_1++;
    $num_2 += 2;
    $sum = $num_1 + $num_2;
    echo "$sum\n";
}

//task3

$box_v = array("label"=>"Box", "dimension"=>"22x33x22");

foreach($box_v as $key => $value) {
  echo  $key. ": ". $value;
  echo "\n";
}

// task3
// $box_v = [
//     "label" => "box",
//     "dimension" => "22x33x22"
// ];
// foreach ($box_v as $key => $value) {
//     echo "key: $key, Value: $value\n";
   
//   }
  
// task4
// array $numbers = array(11, 22, 33, 44);
$numbers = [11, 22, 33, 44];
foreach ($numbers as $index => $value) {
    // echo "Index: $index, Value: $value\n";
    echo  $index.": ". $value;
    echo "\n";
}

// // task_5
function divide_integers($num1, $num2) {
    if (is_int($num1) && is_int($num2)) {
      $quotient = $num1 / $num2;
      echo "The quotient of the two int is: " . $quotient;
    } else {
      echo "Provided numbers are not valid.";
    }
  }
  divide_integers(10,10);