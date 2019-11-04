<?php
include 'dbconnection.php';
//CADASTRO DE EVENTO
if (isset($_POST['cadastrar-evento'])){
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$horaEvento = $_POST['hora-evento'];

	$queryEvento = "INSERT INTO tbeventos (nome_evento,empresa,capacidade,local,data,hora,aprovado) VALUES (?,?,?,?,?,?,?)");
	$loginParams = array($nomeEvento,$empresaOrg,$capacidade,$local,$dataEvento,$horaEvento);
	$insertEvento = sqlsrv_query($conn,$queryLogin,$loginParams);
	
	header("Location: http://localhost:81/cadastrar-evento.php?cadastrado=SOLICITAÇÃO ENVIADA COM SUCESSO"); 
	
}
?>