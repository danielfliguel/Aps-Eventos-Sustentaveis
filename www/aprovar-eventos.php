<?php
include('head.php');
include 'dbconnection.php';
// if (!isset($_SESSION['usuario'])){
// 	header("Location: http://localhost:81/login.php");
// }
// if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
// 	header("Location: http://localhost:81/index.php");
// }
	$queryEventosNaoAprovados = "SELECT * FROM tbeventos WHERE aprovado = 0";
	$eventosNaoAprovados = sqlsrv_query($conn,$queryEventosNaoAprovados);
	
	
	

	
?>

<body>
	

	
	<?php
		if (@$_GET['aprovado']==true){
	?>
		<div class="alert-light text-danger text-center py-3">
			<?php echo $_GET['aprovado'];?>
		</div>
	<?php
		}
	?>
	<h1>APROVAÇÃO DE EVENTOS</h1>
	<div class="container">
		<table class="table">
			<thead>
				<td>ID</td>
				<td>EMPRESA</td>
				<td>EVENTO</td>
				<td>APROVAR</td>
			</thead>
			<?php while($rowEventosNaoAprovados = sqlsrv_fetch_array($eventosNaoAprovados, SQLSRV_FETCH_ASSOC)){?>
				<tr>
					<td><?php echo $rowEventosNaoAprovados['idevento'];?></td>
					<td><?php echo $rowEventosNaoAprovados['empresa'];?></td>
					<td><?php echo $rowEventosNaoAprovados['nome_evento'];?></td>
					<td><a class="btn btn-success" href="aprovar-evento.php?aprovar=<?php echo $rowEventosNaoAprovados['idevento'] ?>">APROVAR</a></td>
				</tr>
			<?php }?>
		</table>		
	</div>

</body>
</html>