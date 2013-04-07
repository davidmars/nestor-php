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
        return Nestor____stuff::getTotalTime();
    }

    /**
     * @return NestorBreakPoint[] The break points list.
     */
    public function breakPoints()
    {
        return Nestor____stuff::$breakPoints;
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
     * filter the Break points to fill groups and main steps arrays
     */
    public function filterBreakPoints()
    {
        foreach (Nestor____stuff::$breakPoints as $bp) {
            if($bp->group){
                if(!isset($this->groups[$bp->group])){
                    $gr=new VV_nestor_group();

                    $gr->name=$bp->group;
                    $this->groups[$bp->group]=$gr;
                }
                $gr=$this->groups[$bp->group];
                $gr->count++;
                $gr->duration+=$bp->info->getDuration();

                if(!$gr->color && ($bp->color && $bp->color != "group")){
                    $gr->color=$bp->color;
                }
                if($bp->color=="group"){
                    $bp->color=$gr->color;
                }
            }


            if($bp->isMainStep){
                $this->mainSteps[]=$bp;
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
    public static function code($code){
        $code=json_encode($code);
        return self::indent($code);


        $code=str_replace("{","\n{\n",$code);
        $code=str_replace("}","\n}\n",$code);
        $code=str_replace("\",","\",\n",$code);
        return $code;

    }

    /**
     * Indents a flat JSON string to make it more human-readable.
     *
     * @param string $json The original JSON string to process.
     *
     * @return string Indented version of the original JSON string.
     */
    private static function indent($json) {

        $result      = '';
        $pos         = 0;
        $strLen      = strlen($json);
        $indentStr   = '  ';
        $newLine     = "\n";
        $prevChar    = '';
        $outOfQuotes = true;

        for ($i=0; $i<=$strLen; $i++) {

            // Grab the next character in the string.
            $char = substr($json, $i, 1);

            // Are we inside a quoted string?
            if ($char == '"' && $prevChar != '\\') {
                $outOfQuotes = !$outOfQuotes;

                // If this character is the end of an element,
                // output a new line and indent the next line.
            } else if(($char == '}' || $char == ']') && $outOfQuotes) {
                $result .= $newLine;
                $pos --;
                for ($j=0; $j<$pos; $j++) {
                    $result .= $indentStr;
                }
            }

            // Add the character to the result string.
            $result .= $char;

            // If the last character was the beginning of an element,
            // output a new line and indent the next line.
            if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos ++;
                }

                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }

            $prevChar = $char;
        }

        return $result;
    }




}

/**
 * Class VV_nestor_group Define a group of break points. The goal here is just to display name, number of logs and total time of this logs.
 */
class VV_nestor_group{
    /**
     * @var int Total getDuration of this breakpoint groups
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
    /**
     * @var string The default color for a group
     */
    public $color="";
}