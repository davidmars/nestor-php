<?php

//-------------beginning of your program--------------------

//import Nestor Class...
require_once "nestor/Nestor.php";
//start nestor and give him a public and writable directory to store logs and the http path to access it.
Nestor::start("a-directory/where-to-store-logs","tests/nestor-php/");

//----------------logs-------------------

//Just perform a simple log
Nestor::log("Hello world");

//a looooooong log
$myLongLog=Nestor::log("The lonnnng log","This one starts just after the hello world","#B66B00");
for ($i=0;$i<10;$i++){
    $myCountLog=Nestor::log("Loop n.$i","I am the number $i loop","#7BB130","Stupid loops");
    $myCountLog->isMainStep=true;
    for($j=0;$j<50;$j++){
        $aLog=Nestor::log("Add one = $j","I am the number $j","#D9CB55","Stupid iterations");
        $aLog->stop();
    }
    //tell to nestor that the "Count to 500" operation is now finished
    $myCountLog->stop();
}
$myLongLog->stop();





//-------------end of your program--------------------

//stop nestor timer and return a header.
echo Nestor::end();



