<?php


use App\Utilities\Response;

$request_method=$_SERVER['REQUEST_METHOD'];

$request_body=json_decode(file_get_contents('php://input'), true);

switch ($request_method) {
    case 'GET':
        $province_id=$_GET['province_id'] ?? null;

        $data=[
            'province_id' => $province_id
        ];
        $response=getCities($data);
         return Response::respondAndDie($response,Response::HTTP_OK);
        break;
    
    default:
        # code...
        break;
}