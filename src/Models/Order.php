<?php
namespace Models;

class Order
{
    const TABLE_NAME = 'orders';

    public function __construct()
    {
       
    }

    public static function all()
    {
        $db = new \DB\DbPDO();
        return $db->getAllTableValues(self::TABLE_NAME);
    }
    

}
