<?php

require  '../../../vendor/autoload.php';


use App\Utilities\Response;
use App\Services\CityService;



$request_body = json_decode(file_get_contents('php://input'), true);
$request_method = $_SERVER['REQUEST_METHOD'];
$response = new CityService;


switch ($request_method) {
    case 'GET':

        $province_id = $_GET['province_id'] ?? null;

        $data = [
            'province_id' => $province_id
        ];

        $result = $response->getCities($data);
        return Response::respondAndDie($result, Response::HTTP_OK);


    case 'POST':

        $result = $response->createCity($request_body);
        if ($result)
            return Response::respondAndDie($result, Response::HTTP_OK);
        else
            return Response::respondAndDie($result, Response::HTTP_NOT_FOUND);

    case 'PUT':

        [$city_id,$name]=[$request_body['city_id'],$request_body['name']];
        $result = $response->UpdateCityName($city_id,$name);
        if ($result)
            return Response::respondAndDie($result, Response::HTTP_OK);
        else
            return Response::respondAndDie($result, Response::HTTP_NOT_FOUND);


}
