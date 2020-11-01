<?php
require_once 'vendor/autoload.php';

$db =  new DB\DbPDO();

foreach ($db->getAllTableValues('orders') as $row) {
    print $row['id_order'] . "\t";
    print $row['id_customer'] . "\t";
}
