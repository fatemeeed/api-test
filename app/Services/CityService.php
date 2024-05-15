<?php

namespace App\Services;

use PDO;
use PDOException;

// <!-- pdo conection -->



class CityService
{
    




    public  function getCities($data = null)
    {
        
        global $conn;
        
        $province_id = $data['province_id'] ?? null;
        $where = '';

        if (!is_null($province_id) || is_int($province_id)) {
            $where = "province_id={$province_id} ";
        }

        $query="SELECT * FROM city {$where}";
      
        $sth = $conn->prepare($query);
      
        $sth->execute();
        
        $records = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }
}
