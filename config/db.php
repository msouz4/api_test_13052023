<?php

require_once 'C:\xampp\htdocs\api\config\config.php';

class db{

	private static $instance;

	public static function getInstance(){

		if(!isset(self::$instance)){

			try {
				self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		return self::$instance;
	}

	public static function beginTransaction(){
		self::getInstance();
		self::$instance->beginTransaction(); 
	}
	
	public static function commit(){
		self::getInstance();
		self::$instance->commit(); 
	}
	
	public static function rollBack(){
		self::getInstance();
		self::$instance->rollBack(); 
	}   
 	
	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}

}