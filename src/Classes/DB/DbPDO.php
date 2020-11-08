<?php
namespace DB;

class DbPDO extends \PDO
{
    public function __construct()
    {
        $dsn = sprintf( 'mysql:dbname=%s;port=%s;host=%s', _DB_NAME_, _DB_PORT_, _DB_SERVER_);
        parent::__construct($dsn, _DB_USER_, _DB_PASSWD_);
    }
    
    public function getAllTableValues($table_name)
    {
        $sql = 'SELECT * FROM ' . $table_name;
        $results = $this->query($sql);
        $result = $results->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }

    public function getAllTableValuesById($table_name, $id_field_name, $id)
    {
        $sql = 'SELECT * FROM ' . $table_name . ' WHERE '.$id_field_name.' = '.$id;
        $results = $this->query($sql);
        $result = $results->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }

    public function getSqlQueryResult($sql)
    {
        //$sql = $this->quote($sql);
        
        //return $this->query($sql);
        //$results = $this->query($sql);
        //print_r($results);
        //die;
        //$result = $results->fetchAll(\PDO::FETCH_ASSOC);
        return $this->query($sql);
    }
    

}
