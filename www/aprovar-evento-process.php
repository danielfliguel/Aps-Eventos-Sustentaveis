<?php
include 'dbconnection.php';

//APROVAÇÃO DE EVENTO
	$idEvento = $_GET['aprovar'];

	$queryAprovarEvento = "UPDATE dbo.tbeventos SET aprovado = 1 WHERE idevento = ?";
	$paramAprovarEvento = array($idEvento);
	$aprovarEvento = sqlsrv_query($conn,$queryAprovarEvento,$paramAprovarEvento);
	var_dump($aprovarEvento);
	
	sqlsrv_free_stmt($aprovarEvento);

	header("Location: http://localhost:81/aprovar-eventos.php?aprovado=EVENTO APROVADO COM SUCESSO");


?>