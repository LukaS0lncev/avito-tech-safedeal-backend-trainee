<?php
require_once 'vendor/autoload.php';

$request = new \Routes\Route;
$parameters = $request->run();
$controller = new $parameters['controller'];
$function_name = $parameters['function'];
$controller->$function_name($parameters['parameters']);