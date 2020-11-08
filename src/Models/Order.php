<?php
namespace Models;
use \Factory\DB\MysqlBuilder;
use \Factory\DB\DbPdoBuilder;

class Order
{
    const TABLE_NAME = 'orders';
    const ID_FIELD_NAME = 'id_order';

    public function __construct()
    {

    }

    /**
     * Получить все значения таблицы orders
     * @return array
     */
    public static function all()
    {
        $mysqlBuilder = new MysqlBuilder();
        $db = new DbPdoBuilder();
        $sql = $mysqlBuilder
                ->select(self::TABLE_NAME, ["id_order", "id_customer"])
                ->getSQL();
        return $db->execute($sql)->toArray();
    }

    /**
     * Получить значение orders по $id
     * @return array
     */
    public static function find(int $id)
    {
        $mysqlBuilder = new MysqlBuilder();
        $db = new DbPdoBuilder();
        $sql = $mysqlBuilder
                ->select(self::TABLE_NAME, ["id_order", "id_customer"])
                ->where("id_order", "=", $id)
                ->getSQL();
        return $db->execute($sql)->toArray();
    }
    
    /**
     * Сохранить значения в массиве $parameter в таблицу orders
     */
    public static function save($parameter)
    {

    }

}
