<?php
/**
 * Class Nestor____vars
 * Because I don't want to get all this stuff in nestor directly for a minimal code autosuggestion.
 */
class Nestor____vars {
    /**
     * @return int Return the diff between startTime and endTime...so in theory the total time you program took to be executed.
     */
    public static function getTotalTime(){
        return self::$endTime-self::$startTime;
    }
    /**
     * @return NestorView return the result popin view object.
     */
    public  static function getViewPopIn(){
        if(!self::isActive()){
            return null;
        }
        $vv=new VV_nestor();
        $vv->filterBreakPoints();
        $view =new NestorView("html/main",$vv);
        return $view;
    }

    /**
     * @var string The public url to access logs folder
     */
    public static $httpLogsStorage="/";

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
}