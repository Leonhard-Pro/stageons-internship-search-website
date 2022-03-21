<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');

//get the differents parameters from the URL
$params = explode('/', $_GET['p']);
$controller = ucfirst($params[0]);
$action = isset($params[1]) ? $params[1] : 'index'; //if no file called from URL load index

//include the file that is asked by the URL
require('controllers/'.$controller.'.php');
$controller = new $controller();
//check if the method call from the URL exists
if(method_exists($controller, $action)) {
    unset($params[0]); unset($params[1]);
    call_user_func_array(array($controller, $action), $params);
    //$controller->$action();
} else {
    echo 'error 404: Page not found';
}

?>