<?php
require_once 'vendor/autoload.php';

$route = new \Tools\Route();
//Получаем массив GET параметров разделенных слешем
$requestUri = $route->getRequestUri();

//Проверяем на валидный формат запроса
if((($requestUri[0]) != 'api') || (!array_key_exists(1, $requestUri))){
    throw new \RuntimeException('API Not Found', 404);
} else {
    //Проверяем доступ к запрашиваемой таблице
    if(!in_array($requestUri[1], _API_ALLOWED_TABLES_))
    {
        throw new \RuntimeException('API access to the table is denied', 403);
    }
    else{
        //Если проверка пройдена, запускаем работу API
        $api = new \Api\RunApi();
        $api->apiName = $requestUri[1];
        $api->run();
    }
}