<?php
/**
 * Class Nestor____stuff
 * Because I don't want to get all this stuff in nestor directly for a minimal code autosuggestion.
 */
abstract class Nestor____stuff {
    /**
     * @return int Return the diff between startTime and endTime...so in theory the total time you program took to be executed.
     */
    public static function getTotalTime(){
        return self::$endTime-self::$startTime;
    }
    /**
     * set the header that will be used by the browser extension
     */
    public  static function setHeader(){
        if(Nestor____stuff::isActive()){
            header("x-nestor : ".self::getPublicUrl());
        }
    }

    /**
     * @return string The logs public url
     */
    public static function getPublicUrl(){
        return self::$httpLogsStorage."/".self::$logFile;
    }
    /**
     * @return string return The result html logs page as string.
     */
    public  static function getFinalOutput(){
        if(!self::isActive()){
            return null;
        }
        $vv=new VV_nestor();
        $vv->filterBreakPoints();
        $view =new NestorView("html/main",$vv);
        return $view->render();
    }

    /**
     * @var string The public url to access logs folder
     */
    public static $httpLogsStorage="/";
    /**
     * @var string The server path of yhe log file.
     */
    public static $logFile;

    /**
     * @return float The current time of your script in seconds (with 6 decimals);
     */
    public static function getMicrotime(){
        return round(microtime(true)-self::$startTime,6);
    }

    /**
     * @var NestorBreakPoint[] list of break points.
     */
    public static $breakPoints;

    /**
     * @var String The directory where are recorded the logs. This folder has to be writable and is defined by the php user (it's you dude if you read it).
     */
    public static $logsStorage;

    /**
     * @var int start time
     */
    public static $startTime;
    /**
     * @var int end time
     */
    public static $endTime;

    /**
     * @return bool Will be true if the header HTTP_X_NESTOR_IS_INSPECTING is present.
     * This header is sent by the Nestor extension https://chrome.google.com/webstore/detail/nestor-the-inspector/mojocpapgcgodcknmicecdoofceldcab
     */
    public static function isActive(){
        //return true;
        if(self::$_isActive===null){
            self::$_isActive=isset($_SERVER['HTTP_X_NESTOR_IS_INSPECTING']);
        }
        return self::$_isActive;

    }

    /**
     * @var null|bool cache variable for the isActive function.
     */
    private static $_isActive=null;


    /**
     * @param NestorBreakPoint $bp
     *
     * @return string Will be left if the time for the break point is at the beginning of the total time elsewhere will be right
     */
    public static function cssDisplayLeftOrRight($bp){
        if($bp->info->timePercent()>50){
            return "right";
        }else{
            return "left";
        }
    }

    public static function currentUrl(){
        $p = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$p .= "s";}
        $p .= "://";
        return $p.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    }

}