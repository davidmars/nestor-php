<?php
/**
 * A breakpoint
 */
class NestorBreakPoint{
    /**
     * @var Float Time of the break point
     */
    public $time=0;
    /**
     * @var Float Time of the end of the breakPoint
     */
    public $timeEnd=0;
    /**
     * @var bool Define if the breakpoint is a remarkable step in the page generation process.
     */
    public $isMainStep=false;
    /**
     * Use this function to define the endpoint.
     */
    public function setTimeEnd(){
        if(Nestor____vars::isActive()){
            $this->timeEnd=Nestor____vars::getMicrotime();
            $this->_duration=$this->timeEnd-$this->time;
        }
    }

    /**
     * @var Float saved value for duration to no process the operation twice.
     */
    private $_duration;
    /**
     * @return Float return the difference between timeEnd and time
     */
    public function duration(){
        return $this->_duration;
    }

    /**
     * @var int Time difference between this breakpoint and the previous one.
     */
    public $difTime=0;
    /**
     * @var string
     */
    public $type="";

    /**
     * @var string What kind of action was it? A break points with the same group will be counted.
     */
    public $group;
    /**
     * @var What color to use to display the break point
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
     * @var string php file where the breakpoint is inserted
     */
    public $file="";
    /**
     * @var int php line code number where the breakpoint is inserted
     */
    public $fileLine=0;



    /**
     * @return Float Percentage for $time in the total time.
     */
    public function timePercent(){
        $t=$this->time*(100/Nestor____vars::getTotalTime());
        $t=min($t,100);
        $t=max($t,0);
        return $t;
    }

    /**
     * @return Float Percentage for duration in the total time.
     */
    public function durationPercent(){
        $d=$this->duration();
        if($d>0){
            return $this->duration()*(100/Nestor____vars::getTotalTime());
        }else{
            return 0;
        }

    }

    /**
     * @return string Will be left if the time for the break point is at the beginning of the total time elsewhere will be right
     */
    public function cssDisplayLeftOrRight(){
        if($this->timePercent()>50){
            return "right";
        }else{
            return "left";
        }
    }
}