<?php

namespace App\Services;

use PDO;
use PDOException;

class DBConnection{

    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname="iran";
    public $conn="";
    private static $dbConnectionInstance = null;

    public function __construct()
    {
        
    }

    public static function getDBConnectionInstance()
    {
        if(self::$dbConnectionInstance ==null)
        {
            $DBConnectionInstance=new DBConnection;
            self::$dbConnectionInstance=$DBConnectionInstance->dbConnection();
        }
        return self::$dbConnectionInstance;

    }

    private function dbConnection()
    {
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        try{
            return new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password, $options);
        }
        catch (PDOException $e){
            echo "error in database connection: " . $e->getMessage();
            return false;
        }


    }
}