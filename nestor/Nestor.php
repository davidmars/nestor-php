<?php
//we need it
require_once __DIR__."/stuff/NestorBreakPoint.php";
require_once __DIR__."/stuff/Nestor____vars.php";
require_once __DIR__."/stuff/NestorView.php";
require_once __DIR__."/stuff/VV_nestor.php";
require_once __DIR__."/stuff/NestorLabel.php";

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
     * @param int $httpLogsStorage The public path to access the logs.
     *
     */
    public static function start($logsStorage,$httpLogsStorage="/"){
        Nestor____vars::$logsStorage=$logsStorage;
        Nestor____vars::$httpLogsStorage=$httpLogsStorage;
        Nestor____vars::$startTime=microtime(true);
        if(Nestor____vars::isActive()){
            self::setHeader();
        }
    }

    /**
     * set the header that will be used by the browser extension
     */
    private static function setHeader(){
        self::$logFile=Nestor____vars::$logsStorage."/".time()."-".uniqid().".html";
        header("x-nestor : http://".$_SERVER["HTTP_HOST"]."/".Nestor____vars::$httpLogsStorage."".self::$logFile);
        return "toto";
    }

    /**
     * @var string Place where we store the whole html stuff result.
     */
    private static $logFile;

    /**
     * Ends the whole Nestor inspection. Should be called at the end of the program.
     * @return null|String If nestor is active, will return the html content recorded.
     */
    public static function end(){
        if(Nestor____vars::isActive()){
            Nestor____vars::$endTime=microtime(true);
            header("x-nestor-time : ".Nestor____vars::getTotalTime());
            $view=Nestor____vars::getViewPopIn();
            $nestorContent=$view->render();
            file_put_contents(self::$logFile,$nestorContent);
            return $nestorContent;
        }
        return null;

    }

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
        if(!Nestor____vars::isActive()){
            return $bp;
        }
        $bp->label=$title;
        $bp->details=$details;
        $bp->group=$group;
        $bp->color=$color;
        $bp->type=$group;
        $bp->time=Nestor____vars::getMicrotime();

        //backtrace
        $bt=debug_backtrace();
        $bp->file=$bt[0]["file"];
        $bp->fileLine=$bt[0]["line"];
        Nestor____vars::$breakPoints[]=$bp;
        return $bp;
    }

}




