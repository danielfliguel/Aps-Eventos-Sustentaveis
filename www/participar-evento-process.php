<?php
	session_start();
	include 'dbconnection.php';
	$idEvento = (int)$_GET['participar'];
	var_dump($idEvento);
	$idParticipante = $_SESSION['idusuario'];
	var_dump($idParticipante);
	$queryParticiparEvento = "UPDATE dbo.tbusuarios SET evento_inscrito = 1 WHERE idusuario = ?";
	$paramsParticiparEvento = array($idParticipante);
	$participarEvento = sqlsrv_query($conn,$queryParticiparEvento,$paramsParticiparEvento);
	sqlsrv_free_stmt($participarEvento);
	

	header("Location: http://localhost:81/consultar-eventos-visitante.php?participacaoConfirmada=PARTICIPAÇÃO CONFIRMADA");

?>