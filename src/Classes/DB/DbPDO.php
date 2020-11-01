<?php
namespace DB;

class DbPDO extends \PDO
{
    public function __construct()
    {
        $dsn = sprintf( 'mysql:dbname=%s;host=%s', _DB_NAME_, _DB_SERVER_);
        parent::__construct($dsn, _DB_USER_, _DB_PASSWD_);
    }
    
    public static function test()
    {
        echo 'DbPDO';
    }

}
