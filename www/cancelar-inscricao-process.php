<?php
include 'dbconnection.php';

$queryCancelarParticipacao = "UPDATE tbusuarios SET evento_inscrito = 0 WHERE idusuario = ?";
$paramCancelarParticipacao = array($_SESSION['idusuario']);
$cancelarParticipacao = sqlsrv_query($conn,$queryCancelarParticipacao,$paramCancelarParticipacao);
sqlsrv_free_stmt($cancelarParticipacao);

header("Location: http://localhost:81/consultar-eventos-visitante.php");


?>