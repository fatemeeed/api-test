<?php


use PDO;
use App\Services\DBConnection;

function getUserByEmail($email){

    $conn = DBConnection::getDBConnectionInstance();

    $where="email='$email'";
    $sth=$conn->prepare("select id from users where {$where}");
    $sth->execute();
    $id = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $id;

}