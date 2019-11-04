<?php 
//EDITAR EVENTO
	$idEvento = (int) $_POST['id-evento'];
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$dataEvento = date('Y-m-d', $dataEvento);
	$horaEvento = $_POST['hora-evento'];
	$statusEvento = $_POST['status-evento'];

	$editarEventoQuery = "UPDATE tbeventos SET nome_evento = ?, empresa = ?, capacidade = ?, local = ?, data = ?, hora = ?, aprovado = ? WHERE idevento = ?";
	$editarEventoParams = array($nome_evento,$empresaOrg,$capacidade,$local,$dataEvento,$horaEvento,$statusEvento);
	$editarEvento = sqlsrv_query($conn,$editarEventoQuery,$editarEventoParams);
	sqlsrv_free_stmt($editarEvento);


	
	header("Location: http://localhost:81/index.php?editar=Evento Editado com Sucesso"); 
	

?>