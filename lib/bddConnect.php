<?php  

class bddConnect{

	public static function getMySqlConnection(){
		$db = new PDO('mysql:host=localhost;port=8889;dbname=blog','root','root');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec("set names 'utf8';");
		return $db;
	}
}