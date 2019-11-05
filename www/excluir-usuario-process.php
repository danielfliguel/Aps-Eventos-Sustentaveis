<?php
include 'dbconnection.php';
	$idUsuario = (int)$_GET['excluirUsuario'];	
	
	$queryRemoverUsuario = "DELETE FROM dbo.tbusuarios WHERE idusuario = ?";
	$paramRemoverUsuario = array($idUsuario);
	var_dump($idUsuario);	
	$removerUsuario = sqlsrv_query($conn,$queryRemoverUsuario,$paramRemoverUsuario);
	

	$queryRemoverContatoUsuario = "DELETE FROM dbo.tbcontato WHERE idusuario = ?";
	$paramRemoverContatoUsuario = array($idUsuario);
	$removerContatoUsuario = sqlsrv_query($conn,$queryRemoverContatoUsuario,$paramRemoverContatoUsuario);

	sqlsrv_free_stmt($removerUsuario);
	sqlsrv_free_stmt($removerContatoUsuario);
	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	

?>