<?php
require_once("database.php");

class User{

	public $id;
	public $first_name ;
	public $last_name;
	public $password;
	public $username;


	public static function authenticate($username = "", $password = ""){
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);

		$sql = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";

		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	public static function find_all(){
		return self::find_by_sql("SELECT * FROM users");
	}

	public static function find_by_id($id=0){ 
		$result_array = self::find_by_sql("SELECT * FROM users WHERE id = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;

	}

	public static function find_by_sql($sql=""){
		global $database;
		$result_set= $database->query($sql);
		$object_array = array();
		while($row = mysql_fetch_array($result_set)){
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function instantiate($record){

		$object = new self;
		foreach($record as $attri => $value){
			if($object->has_attribute($attri)){
				$object->$attri = $value;
			}
		}
		return $object;
	}

	public function has_attribute($attri){

		$object_vars = get_object_vars($this);
		return array_key_exists($attri, $object_vars);
	}
}

?>