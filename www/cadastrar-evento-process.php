<?php
include 'dbconnection.php';
//CADASTRO DE EVENTO
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$dataEvento = date('Y-m-d', $dataEvento);
	$horaEvento = $_POST['hora-evento'];

	$queryEvento = "INSERT INTO dbo.tbeventos (nome_evento,empresa,capacidade,local,data,hora,aprovado) VALUES (?,?,?,?,?,?,0)";
	$eventoParams = array($nomeEvento,$empresaOrg,$capacidade,$local,$dataEvento,$horaEvento);
	$insertEvento = sqlsrv_query($conn,$queryEvento,$eventoParams);
	sqlsrv_free_stmt($insertEvento);

	if ($insertEvento ==TRUE){
		header("Location: http://localhost:81/cadastrar-evento.php?cadastrado=SOLICITAÇÃO ENVIADA COM SUCESSO"); 
	}else{
		header("Location: http://localhost:81/cadastrar-evento.php?cadastrado=NÃO FOI POSSÍVEL CADASTRAR O EVENTO");
	}
	

?>