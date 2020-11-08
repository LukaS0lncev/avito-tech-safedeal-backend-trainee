<?php
require_once 'vendor/autoload.php';

use \Factory\DB\MysqlBuilder;
use \Factory\DB\DbPdoBuilder;
use \Routes\Route;
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
$request = new Route();
print_r($request->run());
die;


function clientCode(MysqlBuilder $mysqlBuilder)
{
    // ...

    $query = $mysqlBuilder
        ->select("test_table_1", ["table_id", "name", "no_name"])
        ->where("table_id", "=", 4)
        ->where("age", ">", 20)
        //->limit(10, 20)
        ->getSQL();

    $db = new DbPdoBuilder();
    $results = $db
            ->execute($query)
            ->toJson();

    print_r($results);
    die;
    //echo $query;

    // ...
}


//echo "Testing MySQL query builder:\n";
clientCode(new MysqlBuilder());
