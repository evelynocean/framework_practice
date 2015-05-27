<?php

//function __autoload($classname) {
//    $file = __DIR__ . "/classes/" . $classname . '.php';
//    if (is_readable($file)) {
//        require $file;
//    }
//}

//function autoload ($classname)
//{
//    $folders = array(
//        __DIR__ . '/aaa/',
//        __DIR__ . '/classes/',
//    );
//    foreach ($folders as $folder) {
//        $file = $folder . $classname . '.php';
//        if (is_readable($file)) {
//            require $file;
//        }
//    }
//}
//define('CORE_PATH', __DIR__.'/core');
define('APP_PATH', __DIR__.'/app');

function autoload($classname)
{
    $classname = ltrim($classname, '\\');
    $file = APP_PATH . "/classes/";

    // exist namespace
    if ($lastpos = strrpos($classname, '\\')) {
        $namespace = substr($classname, 0, $lastpos);
        $classname = substr($classname, $lastpos + 1);
        $file =  __DIR__. DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, strtolower($namespace)) . DIRECTORY_SEPARATOR;
    }

    $file .= $classname . '.php';
    if (is_readable($file)) {
        require $file;
    } else {
        // controller
        $file = APP_PATH . "/classes/controller/" . $classname . '.php';
        if (is_readable($file)) {
            require $file;
        } else {
            echo 'Not Found ['.$file.'].';
        }
    }
}

spl_autoload_register('autoload');


// path setting
$url = explode("/", $_SERVER['REQUEST_URI']);
if (isset($url[2])) {
//    $AA = 'APP\Classes\Controller\\'. ucfirst($url[1]);
    $AA = ucfirst($url[1]);
    $act = 'action_'.$url[2];
    $target = new $AA;
    $target->$act();
} elseif (isset($url[1])) {
//    $AA = 'APP\Classes\Controller\\'. ucfirst($url[1]);
    $AA = ucfirst($url[1]);
    $target = new $AA;
    $target->action_index();
}

