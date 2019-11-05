<?php 
include 'dbconnection.php';
//EDITAR EVENTO
	$idEvento = (int) $_POST['id-evento'];
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = (int)$_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$dataEvento = date('Y-m-d', $dataEvento);
	$horaEvento = $_POST['hora-evento'];
	$statusEvento = (int)$_POST['status-evento'];

	var_dump($idEvento);

	$editarEventoQuery = "UPDATE dbo.tbeventos SET empresa = ?, nome_evento = ?, capacidade = ?, local = ?, data = ?, hora = ?, aprovado = ? WHERE idevento = ?";
	$editarEventoParams = array($empresaOrg,$nomeEvento,$capacidade,$local,$dataEvento,$horaEvento,$statusEvento,$idEvento);
	$editarEvento = sqlsrv_query($conn,$editarEventoQuery,$editarEventoParams);
	sqlsrv_free_stmt($editarEvento);

	
	header("Location: http://localhost:81/consultar-eventos-adm.php?editar=Evento Editado com Sucesso"); 
	

?>