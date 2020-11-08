<?php
require_once 'vendor/autoload.php';

use \Factory\DB\MysqlBuilder;
use \Factory\DB\DbPdoBuilder;
/*

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

*/
//$test = new DbPdoBuilder();
//print_r($test->test());
//die;
function clientCode(MysqlBuilder $mysqlBuilder)
{
    // ...

    $query = $mysqlBuilder
        ->select("test_table_1", ["table_id", "name", "no_name"])
        ->where("table_id", "=", 4)
        ->where("age", ">", 20)
        //->limit(10, 20)
        ->getSQL();
    print_r($query);
    die;
    //echo $query;

    // ...
}


//echo "Testing MySQL query builder:\n";
clientCode(new MysqlBuilder());
