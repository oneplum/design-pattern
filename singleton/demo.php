<?php
class Db {
    private static $db = null;

    private $conn;
    private $config;

    private function __construct($info) {
        $this->config = $info;
        $this->conn = $this->connect();
    }

    public function connect() {
        try {
            $this->conn = new \PDO("mysql:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['dbname']};charset=utf8", $this->config['username'], $this->config['password']);
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public static function getInstance($info) {
        if (self::$db === null) {
            self::$db = new Db($info);
        }
        return self::$db;
    }

    public function getConn() {
        return $this->$conn;
    }
}

$config = ['host'=>'localhost','port'=>'3306','username'=>'admin','password'=>'admin','dbname'=>'users'];
$db = Db::getInstance($config);
$conn = $db->getConn();
