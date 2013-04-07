<?php
//we need it
$currrDir=dirname(__FILE__);
require_once $currrDir."/stuff/NestorBreakPoint.php";
require_once $currrDir."/stuff/Nestor____stuff.php";
require_once $currrDir."/stuff/NestorView.php";
require_once $currrDir."/stuff/VV_nestor.php";
require_once $currrDir."/stuff/NestorLabel.php";

/**
 * Utility class to inspect code. A kind of xdebug for your custom usage.
 * To use it you will need to install the Nestor Chrome extension.
 * https://chrome.google.com/webstore/detail/nestor-the-inspector/mojocpapgcgodcknmicecdoofceldcab
 */
class Nestor
{

    /**
     * Init the timer and set the place where to store logs (should be called when the program boot ).
     * @param string $logsStorage A writable directory where to store the logs
     * @param string $httpLogsStorage The public path to access the logs folder...Something like http://your-domain.com/logs
     *
     */
    public static function start($logsStorage,$httpLogsStorage=""){
        Nestor____stuff::$logsStorage=$logsStorage;
        Nestor____stuff::$httpLogsStorage=$httpLogsStorage;
        Nestor____stuff::$logFile=time()."-".uniqid().".html";
        Nestor____stuff::$startTime=microtime(true);
        Nestor____stuff::setHeader();
    }

    /**
     * @return bool True if Nestor is inspecting (if the pluggin is activated...you get it?)
     */
    public static function isInspecting(){
        return Nestor____stuff::isActive();
    }



    /**
     * @var string Place where we store the whole html stuff result.
     */
    private static $logFile;

    /**
     * Ends the whole Nestor inspection. Should be called at the end of the program.
     * @return null|String If nestor is active, will return the public url (http://something/etc...) result.
     */
    public static function end(){
        if(Nestor____stuff::isActive()){
            self::cleanDirectory();
            Nestor____stuff::$endTime=microtime(true);
            $json=array();
            $json["score"]=Nestor____stuff::getTotalTime();

            //just record a little file with duration
            file_put_contents(Nestor____stuff::$logsStorage."/".Nestor____stuff::$logFile."-info.json",json_encode($json));
            //header("x-nestor-time : ".Nestor____stuff::getTotalTime());
            $nestorContent=Nestor____stuff::getFinalOutput();
            file_put_contents(Nestor____stuff::$logsStorage."/".Nestor____stuff::$logFile,$nestorContent);
            return Nestor____stuff::getPublicUrl();
        }
        return null;
    }

    /**
     * prevent the hard drive to explode
     */
    private static function cleanDirectory(){
        $files=scandir(Nestor____stuff::$logsStorage);
        while(count($files)>self::$configMaximumFiles){
            $f=Nestor____stuff::$logsStorage."/".array_shift($files);
            if(is_file($f)){
                unlink($f);
            }

        }
    }

    /**
     * @var int Maximum number of log files to keep. Default to 1000. Prevent your hosting hard drive to explode!
     */
    public static $configMaximumFiles=1000;

    /**
     * @param string        $title     Title of your log
     * @param string        $details   More information for this log
     * @param null|string   $color     An hexadecimal color (#ff00ee) to use to display the log
     * @param null|string   $group     If set will count all logs in this group. This is useful to count number of database request, number of file included...in fact to count similar actions.
     *
     * @return NestorBreakPoint
     */
    public static function log($title,$details="",$color=null,$group=null){
        $bp=new NestorBreakPoint();
        if(!Nestor____stuff::isActive()){
            return $bp;
        }
        $bp->label=$title;
        $bp->details=$details;
        $bp->group=$group;
        $bp->color=$color;

        //backtrace
        $bt=debug_backtrace();
        $bp->info->file=$bt[0]["file"];
        $bp->info->fileLine=$bt[0]["line"];
        Nestor____stuff::$breakPoints[]=$bp;
        return $bp;
    }

}




