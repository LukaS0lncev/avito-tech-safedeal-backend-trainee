<?php
require_once 'vendor/autoload.php';

//$db =  new DB\DbPDO();

//foreach ($db->getAllTableValues('orders') as $row) {
//    print $row['id_order'] . "\t";
//    print $row['id_customer'] . "\t";
//}


/*
$route = new Tools\Route();
//var_dump($route->getMethod()."<br>");
//var_dump($route->getRequestUri()."<br>");
$getRequestParams = $route->getRequestParams();
$getMethod = $route->getMethod();
$getRequestUri = $route->getRequestUri();
echo $getRequestParams;
*/
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


$orders = \Models\Order::all();
foreach ($orders as $row) {
    print $row['id_order'] . "\t";
    print $row['id_customer'] . "\t";
}
//var_dump($orders);
