<?php
include 'head.php';
include 'dbconnection.php';
// if (!isset($_SESSION['usuario'])){
// 	header("Location: http://localhost:81/login.php");
// }
// if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
// 	header("Location: http://localhost:81/index.php");
// }
?>
<body>
	
	<?php 
	$queryEventos = "SELECT * FROM dbo.tbeventos";
	$queryEventosResults = sqlsrv_query($conn,$queryEventos);
	 	
	?>
	<h1>EDITAR EVENTOS</h1>
	<div class="container">
		<table class="table">
			<thead>
				<td>ID</td>
				<td>NOME DO EVENTO</td>
				<td>EDITAR</td>
				<?php if ($_SESSION['tipo-cadastro']=='Administrador'):?>
					<td>EXCLUIR</td>
				<?php endif; ?>
			</thead>
			<?php while($rowEvento = sqlsrv_fetch_array($queryEventosResults, SQLSRV_FETCH_ASSOC)){?>
				<tr>
					<td><?php echo $rowEvento['idevento'];?></td>
					<td><?php echo $rowEvento['nome_evento'];?></td>
					<td><a class="btn btn-primary" href="cadastrar-evento.php?editarEvento=<?php echo $rowEvento['idevento'] ?>">EDITAR</a></td>
					<?php if ($_SESSION['tipo-cadastro']=='Administrador'){?>
						<td><a class="btn btn-danger" href="process.php?excluirEvento=<?php echo $rowEvento['idevento'] ?>">EXCLUIR</a></td>
					<?php } ?>
				</tr>
			<?php }?>
		</table>		
	</div>

</body>
</html>