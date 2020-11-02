<?php
namespace Models;

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
        $db = new \DB\DbPDO();
        $result = $db->getAllTableValues(self::TABLE_NAME);
        return $result;
    }

    /**
     * Получить значение orders по $id
     * @return array
     */
    public static function find($id)
    {
        $db = new \DB\DbPDO();
        $result = $db->getAllTableValuesById(self::TABLE_NAME, self::ID_FIELD_NAME, $id);
        return $result;
    }
    
    /**
     * Сохранить значения в массиве $parameter в таблицу orders
     */
    public static function save($parameter)
    {
        $db = new \DB\DbPDO();
        $sql = 'INSERT INTO '.self::TABLE_NAME.' (id_customer) VALUES (:id_customer)';
        $result= $db->prepare($sql);
        $result->execute($parameter);
        return $result;
    }

}
