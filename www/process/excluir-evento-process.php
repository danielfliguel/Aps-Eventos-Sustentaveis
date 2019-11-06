<?php 
include 'dbconnection.php';

$idEvento = $_GET['excluirEvento'];	

$queryExcluirEvento = "DELETE FROM tbeventos WHERE idevento = ? ";
$paramExcluirEvento = array($idEvento);
$excluirEvento = sqlsrv_query($conn,$queryExcluirEvento,$paramExcluirEvento);

sqlsrv_free_stmt($excluirEvento);	
	
header("Location: http://localhost:81/consultar-eventos-adm.php?excluir=Evento excluído com sucesso"); 
	
?>