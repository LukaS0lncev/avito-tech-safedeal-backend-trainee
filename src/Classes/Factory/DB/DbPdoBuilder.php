<?php
namespace Factory\DB;

interface DbPdoBuilderInterface
{
    public function test(): DbPdoBuilderInterface;
    public function execute(string $sql): DbPdoBuilderInterface;
    public function toArray(): array;
    public function toJson(): string;
}

class DbPdoBuilder implements DbPdoBuilderInterface
{
    protected $db;
    
    public function __construct()
    {
        $dsn = sprintf( 'mysql:dbname=%s;port=%s;host=%s', _DB_NAME_, _DB_PORT_, _DB_SERVER_);
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->db->pdo = new \PDO($dsn, _DB_USER_, _DB_PASSWD_, $opt);
    }
    
    public function test(): DbPdoBuilderInterface
    {
        return $this;
    }

    /**
     * Выполнить sql запрос
     */
    public function execute(string $sql): DbPdoBuilderInterface
    {
        $db = $this->db->pdo;
        $this->db->execute = $db->query($sql);
        return $this;
    }


    /**
     * Получить ответ  в виде массива
     */
    public function toArray(): array
    {
        return $this->db->execute->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     *  Получить ответ  в виде json строки
     */
    public function toJson(): string
    {
        return json_encode($this->db->execute->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }
}