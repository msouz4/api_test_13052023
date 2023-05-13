<?php

require_once 'C:\xampp\htdocs\api\control\ProductController.php';
require_once 'C:\xampp\htdocs\api\config\db.php';

// Method
$request_method = $_SERVER["REQUEST_METHOD"];

// Data
$data = file_get_contents('php://input');
$obj =  json_decode($data);

// Empty
if (empty($data)){
    header("HTTP/1.0 400 Bad Request");
    exit;
}

switch($request_method){
    case 'POST':
        // Insert Product
        $Controller = new ProductController();
        $db = new db();
        $db::beginTransaction();
            foreach($obj as $row){
                $Controller->insert($row);
            }
        $db::commit();
        break;

    case 'PUT':
         // Update Product
         $Controller = new ProductController();
         $db = new db();
         $db::beginTransaction();
             foreach($obj as $row){
                 $Controller->update($row);
             }
         $db::commit();
         break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}