<?php 	
session_start();

$serverName = "mysql-milgrau.database.windows.net";
$connectionOptions = array("Database"=>"eventos_milgrau",
	"Uid"=>"milgrau",
	"PWD"=>"Mil45678"
);
$conn = sqlsrv_connect($serverName,$connectionOptions);
?>