<?php

//task-1
$count = 0;

while (true) {
    $count++;
    var_dump($count);
    if ($count === 10) {
        break;
    }
}
echo $count;

//task-2
for($i = 1; $i <= 20; $i++){
    if($i % 2 === 0){
      continue;
    }
    echo "Count: ".$i. "\n";
}

// task-3

$cities = array("Chennai", "Madurai", "Tirunelveli", "Erode", "Thoothukkudi", "Sivakasi", "Karur", "Rajapalayam", "Ambur", "pune");

$cities[] = "Neyveli";

array_unshift($cities, "Virudhunagar");

$first_five_cities = array_slice($cities, 0, 5);

rsort($cities);

$filtered_cities = array_filter($cities, function ($city) {
    return strlen($city) < 5;
});
$filtered_cities_count = count($filtered_cities);

echo "Declared array=  " . implode(", ", $cities) . "\n";
//Result of 
// task(a) 
echo "Added a city in the end: " . implode(", ", $cities) . "\n";
//task(b)
echo "Added a city in the start: " . implode(", ", $cities) . "\n";
//task(c)
echo "Get Array with first five cities: " . implode(", ", $first_five_cities) . "\n";
//task(d)
echo "Array sorted in descending order: " . implode(", ", $cities) . "\n";
//task(e)
echo "Filtered cities less than 5 characters name: " . implode(", ", $filtered_cities) . "\n";
echo "Length of filtered array: " . $filtered_cities_count;

$filtered_cities = array_filter($cities, function ($city) {
    return strlen($city) < 5;
});

$filtered_cities_count = count($filtered_cities);

// task-4

// $num_value = ["1","2","3","4","5","6","7","8","9","10"];
// unset($num_value [5]);
// unset($num_value [6]);
// unset($num_value [7]);
// var_dump($num_value);

$numbers = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9),
    array(10, 11, 12),
    array(13, 14, 15),
    array(16, 17, 18),
    array(19, 20, 21),
    array(22, 23, 24),
    array(25, 26, 27),
    array(28, 29, 30)
);


$array = array_splice($numbers, 5, 3);
$numbers = array_values($numbers);


var_dump($numbers); 
    
    // unset($array [5]);
    // unset($array [6]);
    // unset($array [7]);
    // var_dump($array);
   
    // array_splice($array, 4, 3);
    // var_dump($array);