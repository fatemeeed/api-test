<?php

namespace App;

use PDO;
use PDOException;

// <!-- pdo conection -->
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=iran", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// // Validation
// function isValidCity($data)
// {
//     if (empty($data['province_id']) || !is_numeric($data['province_id']))
//         return false;

//     return empty($data['name']) ? false : true;
// }
// function isValidProvince($data)
// {

//     return empty($data['name']) ? false : true;
// }

// function getCities($data)
// {
//     global $conn;
//     $province_id=$data['province_id'] ?? null;
//     $where='';

//     if(!is_null($province_id) || is_int($province_id)){
//         $where="province_id={$province_id} ";
//     }

//     $sth = $conn->prepare('SELECT * FROM city {$where}');
//     $sth->execute();
//     $records=$sth->fetchAll(PDO::FETCH_OBJ);

//     return $records;

// }
// function getProvince()
// {

// }
