<?php
/**
 * Class Model đóng vai trò class Model cha
 */
class Database{

    // public static $db;
    private static $dns='mysql:host=localhost;dbname=mvc_project2;charset=utf8';
    private static $username='root';
    private static $password='';
   // public $cookie_time = (3600 * 24 * 30); // 30 days
   // public  $cookie_time = (time()+ 3600); // 1 hour
    // public $cookie_name = 'siteAuth';

    public $conn = ' ';

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->conn = new PDO(self::$dns,self::$username,self::$password);
        } catch (PDOException $e) {
            echo "KẾt nối thất bại: " . $e->getMessage();
        }
        return $this->conn;
    }

    public function close()
    {
        $this->conn = null;
    }
}








?>