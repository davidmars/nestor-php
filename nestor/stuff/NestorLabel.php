<?php
/**
 * Class NestorLabel
 * Utility class to get text and colors in the Nestor log output.
 */
class NestorLabel {
    /**
     * @param string $title The title of the label
     * @param string $color The hexadecimal color of the label
     */
    public function __construct($title,$color){
        $this->title=$title;
        $this->color=$color;
    }

    /**
     * @var string The title of the label
     */
    public $title;
    /**
     * @var string The hexadecimal color of the label
     */
    public $color;


    public static function dataBaseQuery(){
        return new NestorLabel("Database query","#00ff00");
    }
    public static function includeFile(){
        return new NestorLabel("Include file","#ff0000");
    }
    public static function view(){
        return new NestorLabel("View","#ffff00");
    }
    public static function model(){
        return new NestorLabel("Model","#ffff00");
    }
}