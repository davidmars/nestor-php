<?php
/**
 * Class VV_nestor
 */
class VV_nestor
{
    /**
     * @return int The total time to execute the script
     */
    public function totalTime()
    {
        return Nestor____vars::getTotalTime();
    }

    /**
     * @return NestorBreakPoint[] The break points list.
     */
    public function breakPoints()
    {
        return Nestor____vars::$breakPoints;
    }

    /**
     * @var NestorBreakPoint[] The mysql queries objects.
     */
    public $queries = array();
    /**
     * @var NestorBreakPoint[] The break points marked as mainStep.
     */
    public $mainSteps = array();

    /**
     * filter the Break points to fill groups array
     */
    public function filterBreakPoints()
    {
        foreach (Nestor____vars::$breakPoints as $bp) {
            if($bp->group){
                if(!isset($this->groups[$bp->group])){
                    $gr=new VV_nestor_group();
                    $gr->name=$bp->group;
                    $this->groups[$bp->group]=$gr;
                }
                $gr=$this->groups[$bp->group];
                $gr->count++;
                $gr->duration+=$bp->duration();
            }
        }
    }

    /**
     * @var VV_nestor_group[]
     */
    public $groups=array();






    /**
     * @return string Return a string label "success" or "warn" or "danger" according how many time took the page to be generated.
     */
    public function globalStatus()
    {
        $t = $this->totalTime();
        if ($t < 0.5) {
            return "success";
        }
        if ($t < 1) {
            return "warn";
        }
        return "danger";
    }




}

class VV_nestor_group{
    /**
     * @var int Total duration of this breakpoint groups
     */
    public $duration=0;
    /**
     * @var int Number of breakpoints of this group
     */
    public $count=0;
    /**
     * @var string
     */
    public $name="";
}