<?php
error_reporting(1);
error_reporting(E_ALL);



//import Nestor Class...
require_once "nestor/Nestor.php";

//start Nestor and give him a public and writable directory to store logs and the related http path to access it.
Nestor::start("a-directory/where-to-store-logs","http://nestor.oneminuteonearth.com/a-directory/where-to-store-logs");
//test if Nestor Chrome extension is active...
if(!Nestor::isInspecting()){
    die("Nestor the inspector is not here. Enable the Nestor extension or <a href='https://chrome.google.com/webstore/detail/nestor-the-inspector/mojocpapgcgodcknmicecdoofceldcab'>install it </a>");
}

//Just perform a simple log
Nestor::log("Hello");

//A log with more details
Nestor::log("world","This text is visible when you roll over the log line in Nestor result");

//Colors !
Nestor::log("Red","The log result will be red","#ff0000");
Nestor::log("Green","The log result will be green","#00ff00");
Nestor::log("Blue","The log result will be blue","#0000ff");

//Groups
Nestor::log("Mick Jagger","lead and backing vocals","#800","The rolling Stones");
Nestor::log("Keith Richards","Elelectric, acoustic, slide and bass guitars, keyboards, backing and lead vocals","group","The rolling Stones");
Nestor::log("Lou Reed","Vocals, guitar","#080","The Velvet Underground");
Nestor::log("Charlie Watts","drums, percussion","group","The rolling Stones");
Nestor::log("John Cale","Multiple instruments, vocals","group","The Velvet Underground");
Nestor::log("Sterling Morrison","Guitar","group","The Velvet Underground");
Nestor::log("Maureen Tucker","Percussion","group","The Velvet Underground");
Nestor::log("Doug Yule","Vocals, guitar","group","The Velvet Underground");
Nestor::log("Ronnie Wood"," electric, acoustic, lap steel, pedal steel, slide and bass guitars, saxophone, drums, backing vocals","group","The rolling Stones");

//highlight important stuff
$myImportantLog=Nestor::log("I'm an important step in the program !","I have a dotted line","#b90");
$myImportantLog->isMainStep=true;

//How many time to perform stuff?
$myLoopLog=Nestor::log("I'm a looong operation"); //start timer
for($i=0;$i<5000000;$i++){
//perform wonderful task here
}
$myLoopLog->stop(); //end timer



/**
 * @param string $place
 * @param int $population
 */
function countPeople($place,$population){
    $myClass=new Continent();
    $myClass->name=$place;
    $myClass->population=$population;
    $log=Nestor::log("Hello $place",$myClass,"#095","Count of peoples");
    for($i=0;$i<$population/1000;$i++){}
    $log->stop();
    $log->isMainStep=true;
}
class Continent{
    public $name;
    public $population;
}

//concurrent programs
$myWorldLog=Nestor::log("Count people on earth planet","in million...","#059");

    countPeople("Asia",4140336501);
    countPeople("Africa",994527534);
    countPeople("Oceania",36102071);

    $america=Nestor::log("America");
    countPeople("North America",528720588);
    countPeople("South America",385742554);
    $america->stop();

    countPeople("Europe",738523843);
    $myWorldLog->stop(); //end timer


//-------------end of your program--------------------
//stop nestor timer...
$logUrl=Nestor::end();
//...then you can access the log result page
echo "<iframe src='".$logUrl."' width='90%' height='90%'>";




