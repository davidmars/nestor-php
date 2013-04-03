<?php

//-------------beginning of your program--------------------

//import Nestor Class...
require_once "nestor/Nestor.php";
//start nestor and give him a public and writable directory to store logs and the http path to access it.
Nestor::start("a-directory/where-to-store-logs","tests/nestor-php/");

//----------------logs-------------------

//Just perform a simple log
Nestor::addBreakPoint("Hello world");



//a looooooong log
$myCountLog=Nestor::log("Count to 5000","This will be long...","#00ff00","Stupid loops");
for($i=0;$i<5000;$i++){
    $aLog=Nestor::log("Add one = $i","I am the number $i","#99ff22","Stupid iterations");
    $aLog->setTimeEnd();
}
//tell to nestor that the "Count to 5000" opération is now finished
$myCountLog->setTimeEnd();


//-------------end of your program--------------------

//stop nestor timer and return a header.
Nestor::end();

