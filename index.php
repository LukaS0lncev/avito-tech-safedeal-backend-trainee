<?php
require_once 'vendor/autoload.php';

use \Routes\Route;

$request = new Route();
$parameters = $request->run();
$controller = new $parameters['controller'];
$function_name = $parameters['function'];
//$results = $controller->$function_name($parameters['parameters']);
//echo $results;
$controller->$function_name($parameters['parameters']);

