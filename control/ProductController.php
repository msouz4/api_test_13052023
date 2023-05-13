<?php
require_once 'C:\xampp\htdocs\api\model\Data.php';

class ProductController{
	function insert($obj){
		$data = new Data();
		return $data->insert($obj);
	}

	function update($obj){
		$data = new Data();
		return $data->update($obj);
		
	}

	function findAll(){
		$data = new Data();
		return $data->findAll();
	}
}

?>