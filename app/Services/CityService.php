<?php

namespace App\Services;

use PDO;
use PDOException;
use App\Services\DBConnection;

// <!-- pdo conection -->



class CityService
{


    public  function getCities($data = null)
    {

        $conn = DBConnection::getDBConnectionInstance();

        $province_id = $data['province_id'] ?? null;
        $where = '';

        if (!is_null($province_id) || is_int($province_id)) {
            $where = "province_id={$province_id} ";
        }

        $query = "SELECT * FROM city {$where}";
        $sth = $conn->prepare($query);
        $sth->execute();
        $records = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function createCity($data)
    {


        if(!$this->isValidCity($data)){

            return false;

        }
        $value=[
            'province_id' => $data['province_id'],
            'name' =>$data['name']
        ];
        $conn = DBConnection::getDBConnectionInstance();
        $query = "insert into `city` (`province_id`,`name`) values (:province_id,:name)";
      
        $conn->prepare($query)->execute($value);
        return true;
    }

    public function UpdateCityName($city_id,$name)
    {

      
        $conn = DBConnection::getDBConnectionInstance();
        $query = "update city set name='$city_id' where id='$name'";
      
        $conn->prepare($query)->execute();
        return true;



    }

    public function destroy($city_id)
    {
        $conn = DBConnection::getDBConnectionInstance();
        $query = "delete from city where id=$city_id";
      
        $conn->prepare($query)->execute();
        return true;

    }

    // Validation
    public function isValidCity($data)
    {
        if (empty($data['province_id']) || !is_numeric($data['province_id']))
            return false;

        return empty($data['name']) ? false : true;
    }

    public function isValidProvince($data)
    {

        return empty($data['name']) ? false : true;
    }


}
