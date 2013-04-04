<?php
/**
 * Class NestorView
 * Used to play with php templates files.
 */
class NestorView
{

    /**
     * @var $_view NestorView the view inside the template
     */

    /**
     *
     * @var VV_nestor Here are the variables used in the view.
     * Inside the template use $_vars to retrieve it.
     * It's an object, so it should be strict and it should be precise.
     */
    public $viewVariables;
    /**
     *
     * @var string Path to the template without view folder and without ".php".
     * @example a templates located at "_app/mvc/v/a-folder/hello-world.php" should be "a-folder/hello-world"
     */
    public $path;


    /**
     *
     * @var bool Will be true if the view is loaded via an ajax request.
     */
    public $isAjax = false;
    /**
     * @var NestorView the View object that called the current view via render or inside...so it can be null too.
     */
    public $caller;
    /**
     *
     * @var string Contains the sub-templates that have called the inside function. So this will be set only if the current view is a kind of layout.
     */
    public $insideContent;
    /**
     *
     * @var NestorView a view outside this view, in practice this view is a layout
     */
    private $outerView;

    /**
     *
     *
     * @param string $path Path to the view
     * @param null   $viewVariables
     */
    public function __construct($path, $viewVariables = null)
    {
        $this->path = $path;
        if (!$viewVariables) {
            $viewVariables = array();
        }
        $this->viewVariables = $viewVariables;
        $this->isAjax = ($_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest");
    }

    /**
     * Try to return a valid path for a template file.
     *
     * @param string $path a relative path to the template file without .php
     *
     * @return string|bool the correct path or false if there is no file that match.
     */
    private static function getRealPath($path)
    {
        $scriptPath = __DIR__ . "/../" . $path . ".php";
        if (file_exists($scriptPath)) {
            return $scriptPath;
        }

        return false;


    }

    /**
     * Process the template with the current properties.
     *
     * @return string The output stuff (probably html)
     */
    private function run()
    {

        $scriptPath = self::getRealPath($this->path);

        if (!$scriptPath) {
//Human::log("Can't find the view :".$this->path, "VIEW ERROR", Human::TYPE_ERROR);
            return ("<div style='font-size:12px;color:#f00;'>Can't find the template :" . $this->path . " ( called in " . $this->caller->path . " )</div>");
        }

//declare the variables in the template
        /* @var $_vars VV_nestor */
        /** @noinspection PhpUnusedLocalVariableInspection */
        $_vars = $this->viewVariables;
        /** @noinspection PhpUnusedLocalVariableInspection */
        $view = $this;
        /** @noinspection PhpUnusedLocalVariableInspection */
        $_content = $this->insideContent;

        /** @noinspection PhpUnusedLocalVariableInspection */
        $_view = $this;

        ob_start();
        /** @noinspection PhpIncludeInspection */
        include $scriptPath;
        $content = ob_get_contents();
        ob_end_clean();
        if ($this->outerView) {
            $this->outerView->insideContent = $content;
            return $this->outerView->run();
        } else {
            return $content;
        }
    }


    /**
     * Process the template and return the result.
     *
     * @param string        $path          The path to the template file
     * @param VV_nestor $viewVariables Variables to feed yhe view
     *
     * @return String The template result after execution
     */
    function render($path = null, $viewVariables = null)
    {

        $viewVariables = isset($viewVariables) ? $viewVariables : $this->viewVariables;
        if ($path) {
            $view = new NestorView($path, $viewVariables);
            $view->caller = $this;
            return $view->run();
        } else {
            $this->viewVariables = $viewVariables;
            return $this->run();
        }

    }


    /**
     * Insert the current template inside an other template.
     * In the layout template use the variable $_content to display the current template.
     *
     * @param String        $path          path to the template file
     * @param VV_nestor $viewVariables the data object given to the outer view, if not given, the object will be the current strictParams
     */
    function inside($path, $viewVariables = null)
    {
        $viewVariables = $viewVariables ? $viewVariables : $this->viewVariables;
        $this->outerView = new NestorView($path, $viewVariables);
        $this->outerView->caller = $this;
    }



}
