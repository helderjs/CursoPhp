<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// put your code here
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define("APP","/ZendCertification");
set_include_path(
        get_include_path() . PATH_SEPARATOR .
        ROOT . DS . "Controller" . PATH_SEPARATOR .
        ROOT . DS . "Model" . PATH_SEPARATOR .
        ROOT . DS . "Config"
);

function __autoload($className) {
    include "{$className}.php";
}

if (!empty($_GET['c'])) {
    $controller = ucfirst($_GET['c']);
    $controller .= 'Controller';

    include("Controller/{$controller}.php");
    if (!class_exists($controller)) {
        throw new Exception('Controller não existe');
    }
    $teste = new $controller();

    if (!empty($_GET['a'])) {
        $action = $_GET['a'];
        $teste->$action();
    } else {
        $teste->index();
    }
} else {
    $teste = new MainController();
    $teste->index();
}
?>
