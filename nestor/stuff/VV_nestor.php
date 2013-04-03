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
     * filter the Break points to fill arrays like $queries or $mainSteps
     */
    public function filterBreakPoints()
    {
        foreach (Nestor____vars::$breakPoints as $bp) {
            if ($bp->type == Nestor::LABEL_MYSQL_QUERY) {
                $this->queries[] = $bp;
            }
            if ($bp->isMainStep) {
                $this->mainSteps[] = $bp;
            }
        }
    }


    /**
     * @return float The total time taken by mysql queries
     */
    public function queriesDuration()
    {
        $duration = 0.0;
        foreach ($this->queries as $q) {
            $duration += $q->duration();
        }
        return number_format($duration, 5);
        //return number_format($duration,4);
    }

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