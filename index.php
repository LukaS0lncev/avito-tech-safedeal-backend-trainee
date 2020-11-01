<?php
require_once 'vendor/autoload.php';

$db =  new DB\DbPDO();
$sql = 'SELECT * FROM orders';

foreach ($db->query($sql) as $row) {
    print $row['id_order'] . "\t";
    print $row['id_customer'] . "\t";
}
