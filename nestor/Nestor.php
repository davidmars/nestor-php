<?php

//we need it
require_once __DIR__."/stuff/NestorBreakPoint.php";
require_once __DIR__."/stuff/Nestor____vars.php";
require_once __DIR__."/stuff/NestorView.php";
require_once __DIR__."/stuff/VV_nestor.php";
require_once __DIR__."/stuff/NestorLabel.php";

/**
 * Utility class to log code. A kind of xdebug for your custom usage.
 * To use it you will need to install the Nestor Chrome extension.
 * https://chrome.google.com/webstore/detail/nestor-the-inspector/mojocpapgcgodcknmicecdoofceldcab
 */
class Nestor
{


    /**
     * The label type for Boot
     */
    const LABEL_BOOT_SYSTEM="Boot";
    const LABEL_BOOT_SYSTEM_COLOR="00DDFF";

    const LABEL_CONTROLLER="Boot routing";
    const LABEL_CONTROLLER_COLOR="0077FF";

    const LABEL_MYSQL_QUERY="MySql";
    const LABEL_MYSQL_QUERY_COLOR="2B802B"; //ok

    const LABEL_MODEL_INIT="Manager init";
    const LABEL_MODEL_INIT_COLOR="FF8000"; //ok

    const LABEL_MODEL_CONSTRUCT="Model construct";
    const LABEL_MODEL_CONSTRUCT_COLOR="E5FF00"; //ok

    const LABEL_INCLUDE_FILE="Include file";
    const LABEL_INCLUDE_FILE_COLOR="ff0000"; //ok

    const LABEL_VV_CONSTRUCT="New View Variable";
    const LABEL_VV_CONSTRUCT_COLOR="FF00E1"; //ok

    const LABEL_VV_ACTION="View Variable action";
    const LABEL_VV_ACTION_COLOR="FF99F3"; //ok

    const LABEL_VIEW="View";
    const LABEL_VIEW_COLOR="C2869E"; //ok

    const LABEL_MYSQL_DEFAULT_COLOR="808080";


    /**
     * init timer (called from boot)
     *
     */
    public static function start($logsStorage){
        Nestor____vars::$logsStorage=$logsStorage;
        Nestor____vars::$startTime=microtime(true);
    }


    /**
     * ends timer (called from boot)
     */
    public static function end(){
        if(Nestor____vars::isActive()){
            Nestor____vars::$endTime=microtime(true);
            $logFile=Nestor____vars::$logsStorage."/".time()."-".uniqid().".html";
            header("x-nestor-time : ".Nestor____vars::getTotalTime());
            $view=Nestor____vars::getViewPopIn();
            $nestorContent=$view->render();
            file_put_contents($logFile,$nestorContent);
            header("x-nestor : http://".$_SERVER["HTTP_HOST"]."/".$logFile);
        }
    }





    /**
     * @param string|NestorLabel     $label The label for your break point OR a NestorLabel object.
     * @param string                $details  The detailed description for this break point
     * @param string                $type
     * @return NestorBreakPoint The new break point. So if you want you will be able to give a time end to your break point.
     */
    public static function addBreakPoint($label,$details="",$type="default"){
        $bp=new NestorBreakPoint();
        if(!Nestor____vars::isActive()){
            return $bp;
        }
        $bp->label=$label;
        $bp->details=$details;
        $bp->type=$type;
        $bt=debug_backtrace();

        $bp->time=Nestor____vars::getMicrotime();
        if(count( Nestor____vars::$breakPoints)>0){

           $old=Nestor____vars::$breakPoints[count( Nestor____vars::$breakPoints)-1];
           $bp->difTime= $bp->time - $old->time;
        }

        $bp->file=$bt[0]["file"];
        $bp->fileLine=$bt[0]["line"];

        Nestor____vars::$breakPoints[]=$bp;
        return $bp;
    }















}




