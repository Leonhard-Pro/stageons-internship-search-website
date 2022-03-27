<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');

$params = explode('/', $_GET['p']);
$controller = $params[0];
$action = isset($params[1]) ? $params[1] : 'index';

require('controllers/'.$controller.'.php');
$controller = new $controller();
if (method_exists($controller, $action)){
    $controller->$action();
}
else {
    echo "Error 404";
}



?>