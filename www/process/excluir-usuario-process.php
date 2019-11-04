<?php
include '../dbconnection.php';
	$idUsuario = (int)$_GET['excluirUsuario'];	
	
	$queryRemoverUsuario = "DELETE FROM dbo.tbusuarios WHERE idusuario = ?";
	$paramRemoverUsuario = array($idUsuario);
	var_dump($idUsuario);	
	$removerUsuario = sqlsrv_query($conn,$queryRemoverUsuario,$paramRemoverUsuario);
	sqlsrv_free_stmt($removerUsuario);
	var_dump($removerUsuario);
	die();

	$queryRemoverContatoUsuario = "DELETE FROM tbcontato WHERE idusuario = ?";
	$paramRemoverContatoUsuario = array($idUsuario);
	$removerContatoUsuario = sqlsrv_query($conn,$queryRemoverContatoUsuario,$paramRemoverContatoUsuario);
	sqlsrv_free_stmt($removerContatoUsuario);
	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	

?>