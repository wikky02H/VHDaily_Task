<?php
use PersonAddress\Address;

require 'Person.php';
require 'Address.php';

// task:1
// a, If ( new Array() ) console.log(“Message displayed”);
//         if ([]) {
//             echo "Message displayed";
//         }else{
//             echo "";
//         }
//     Output: "";

// b,	If ( “false” ){} console.log(“Message displayed”);
//      if( "false" ){
//         echo"Message displayed";
//      }
//      Output: "Message displayed";

// c,	If (“”) console.log(“Message displayed”);
//     if(""){
//          echo "Message displayed";
//     }else{
//         echo " ";
//     }
//       Output: " ";

// d,	If ({}) console.log(“Message displayed”);
//        if({}){
//         echo "Message displayed";
//        }else{
//         echo "";
//        }
//     Output: "";

// task_2 in task.txt file

// task:3

$address = new Address('Venkatesh', 27, '123 Main St', 'Anytown', 'Bengaluru');
echo "person name : ".$address->getName() ."\n"; 
echo "person age : ".$address->getAge() ."\n"; 
echo "person address : ".$address->getAddress() ."\n"; 
$address->sayHello(); 

//task:4 in task.txt file