<?php
namespace Core\Classes;

class View
{
    protected $vars = array();

    public function getView()
    {
        echo 'getView<br>';
    }

    public function __set($vals, $values = null)
    {
        if (count($vals) > 0) {
            foreach ($values as $key => $val) {
                $this->vars[$key] = $val;
            }

        }

        return $this->vars;
    }

    public function __get($index)
    {
        return $this->vars[$index];
    }

    public function fetch($file)
    {
        $file = APP_PATH."/views/{$file}";
        ob_start();
        file_exists($file) and include $file;
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    public function render($file)
    {
        return $this->fetch("{$file}.php");
    }
}