<?php
include('head.php');
include('navbar.php');
if (!isset($_SESSION['usuario'])){
	header("Location: http://localhost:81/login.php");
}
if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
	header("Location: http://localhost:81/index.php");
}
?>
<body>
	
	<?php 
	
	$mysqli = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($mysqli));
	$results = $mysqli->query("SELECT * FROM tbeventos") or die (mysqli_error($mysqli));	
	include_once("navbar.php"); 
	require_once 'process.php';
	
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
			<?php foreach ($results as $row) {?>
				<tr>
					<td><?php echo $row['idevento'];?></td>
					<td><?php echo $row['nome_evento'];?></td>
					<td><a class="btn btn-primary" href="cadastrar-evento.php?editarEvento=<?php echo $row['idevento'] ?>">EDITAR</a></td>
					<?php if ($_SESSION['tipo-cadastro']=='Administrador'):?>
						<td><a class="btn btn-danger" href="process.php?excluirEvento=<?php echo $row['idevento'] ?>">EXCLUIR</a></td>
					<?php endif; ?>
				</tr>
			<?php }?>
		</table>		
	</div>

</body>
</html>