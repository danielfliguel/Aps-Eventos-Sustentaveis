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
	$results = $mysqli->query("SELECT * FROM tbeventos WHERE aprovado = 0") or die (mysqli_error($mysqli));	
	include_once("navbar.php"); 
	require_once 'process.php';
	
	?>
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
				<td>CAPACIDADE</td>
				<td>LOCAL</td>
				<td>DATA</td>
				<td>HORÁRIO</td>
				<td>APROVAR</td>
			</thead>
			<?php foreach ($results as $row) {?>
				<tr>
					<td><?php echo $row['idevento'];?></td>
					<td><?php echo $row['empresa'];?></td>
					<td><?php echo $row['nome_evento'];?></td>
					<td><?php echo $row['capacidade'];?></td>
					<td><?php echo $row['local'];?></td>
					<td><?php echo $row['data'];?></td>
					<td><?php echo $row['hora'];?></td>
					<td><a class="btn btn-success" href="process.php?aprovar=<?php echo $row['idevento'] ?>">APROVAR</a></td>
				</tr>
			<?php }?>
		</table>		
	</div>

</body>
</html>