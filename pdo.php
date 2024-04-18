<?php

define("DB_HOST","fdb1034.awardspace.net");
define("DB_NAME", "4472190_product");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "Product123*");

try{
	$pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC]);
}catch (Exception $ex) { exit($ex->getMessage());}

?>
