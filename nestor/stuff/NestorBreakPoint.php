<?php
/**
 * A breakpoint
 */
class NestorBreakPoint{

    /**
     * @var bool Define if the breakpoint is a remarkable step in the page generation process.
     */
    public $isMainStep=false;

    /**
     * Use this function to define the endpoint.
     */
    public function stop(){
        if(Nestor____stuff::isActive()){
            $this->info->timeEnd=Nestor____stuff::getMicrotime();
            $this->info->duration=$this->info->timeEnd-$this->info->timeStart;
        }
    }

    /**
     * @var string What kind of action was it? A break points with the same group will be counted.
     */
    public $group;
    /**
     * @var string What color to use to display the break point
     */
    public $color;
    /**
     * @var string Label of the break point
     */
    public $label="";
    /**
     * @var string Extended text details for the breakpoint
     */
    public $details="";


    /**
     * A NestorBreakPoint represents a line in the logs result.
     */
    public function __construct(){
        $this->info=new NestorBreakPointInfo();
        $this->info->uid=uniqid("bp");
        $this->info->timeStart=Nestor____stuff::getMicrotime();
    }
}

/**
 * Class NestorBreakPointInfo
 * Here are stored details for a break point
 */
class NestorBreakPointInfo{
    /**
     * @var string The php file where the breakpoint was inserted
     */
    public $file="";
    /**
     * @var int The php file line number where the breakpoint was inserted
     */
    public $fileLine=0;
    /**
     * @var string An unique id
     */
    public $uid;

    /**
     * @return Float Percentage for $time in the total time.
     */
    public function timePercent(){
        $t=$this->timeStart*(100/Nestor____stuff::getTotalTime());
        $t=min($t,100);
        $t=max($t,0);
        return $t;
    }

    /**
     * @return Float Percentage for getDuration in the total time.
     */
    public function durationPercent(){
        $d=$this->getDuration();
        if($d>0){
            return $this->getDuration()*(100/Nestor____stuff::getTotalTime());
        }else{
            return 0;
        }
    }

    /**
     * @return Float return the difference between timeEnd and timeStart
     */
    public function getDuration(){
        return $this->duration;
    }
    /**
     * @var Float saved value for getDuration to no process the operation twice.
     */
    public $duration;
    /**
     * @var Float Time of the break point
     */
    public $timeStart=0;
    /**
     * @var Float Time of the end of the breakPoint
     */
    public $timeEnd=0;
}