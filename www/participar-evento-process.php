<?php
	session_start();
	include 'dbconnection.php';
	$idEvento = (int)$_GET['participar'];
	var_dump($idEvento);
	$idParticipante = $_SESSION['idusuario'];
	var_dump($idParticipante);
	$queryParticiparEvento = "INSERT INTO dbo.tbeventos_participantes (idusuario,idevento) VALUES (?,?)";
	$paramsParticiparEvento = array($idParticipante,$idEvento);
	$participarEvento = sqlsrv_query($conn,$queryParticiparEvento,$paramsParticiparEvento);
	sqlsrv_free_stmt($participarEvento);
	

	header("Location: http://localhost:81/consultar-eventos-visitante.php?participacaoConfirmada=PARTICIPAÇÃO CONFIRMADA");

?>