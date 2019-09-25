<?php
	class Db{
		public static function getConnection(){
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);

			$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
			return $db;
		}
	}
?>