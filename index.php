<?php
require_once 'vendor/autoload.php';

$route = new \Tools\Route();
$requestUri = $route->getRequestUri();

if((($requestUri[0]) != 'api') || (!array_key_exists(1, $requestUri))){
    throw new \RuntimeException('API Not Found', 404);
} else {
    if(!in_array($requestUri[1], _API_ALLOWED_TABLES_))
    {
        throw new \RuntimeException('API access to the table is denied', 403);
    }
    else{
        $api = new \Api\RunApi();
        $api->apiName = $requestUri[1];
        $api->run();
    }
}