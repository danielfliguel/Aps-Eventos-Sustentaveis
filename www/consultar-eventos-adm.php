<?php include_once("navbar.php"); ?>
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
				<td>EXCLUIR</td>
			</thead>
			<?php foreach ($results as $row) {?>
				<tr>
					<td><?php echo $row['idevento'];?></td>
					<td><?php echo $row['nome_evento'];?></td>
					<td><a class="btn btn-primary" href="cadastrar-evento.php?editarEvento=<?php echo $row['idevento'] ?>">EDITAR</a></td>
					<td><a class="btn btn-danger" href="process.php?excluirEvento=<?php echo $row['idevento'] ?>">EXCLUIR</a></td>
				</tr>
			<?php }?>
		</table>		
	</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>	
</body>
</html>