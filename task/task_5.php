<?php
// $array = array(
//         array(1, 2, 3),
//         array(4, 5, 6),
//         array(7, 8, 9),
//         array(10, 11, 12),
//         array(13, 14, 15),
//         array(16, 17, 18),
//         array(19, 20, 21),
//         array(22, 23, 24),
//         array(25, 26, 27),
//         array(28, 29, 30)
//     );
    // array_splice($array,4,3);
    // var_dump($array);


// Create a two-dimensional array of numbers with a length of 10
// $numbers = array(
//     array(1, 2, 3),
//     array(4, 5, 6),
//     array(7, 8, 9),
//     array(10, 11, 12),
//     array(13, 14, 15),
//     array(16, 17, 18),
//     array(19, 20, 21),
//     array(22, 23, 24),
//     array(25, 26, 27),
//     array(28, 29, 30)
// );

// // Remove the 5th, 6th, and 7th indexes without using the unset() method
// array_splice($numbers,5);

// // Print the resulting array
// print_r($numbers);
// 



// Create a two-dimensional array of numbers with a length of 10
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



