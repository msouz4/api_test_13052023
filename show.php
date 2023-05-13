<?php

require_once 'C:\xampp\htdocs\api\control\ProductController.php';
require_once 'C:\xampp\htdocs\api\config\db.php';

$Controller = new ProductController();

header('Content-Type: application/json');

foreach($Controller->findAll() as $value){
	echo json_encode($value);
}
