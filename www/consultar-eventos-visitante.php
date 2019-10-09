<?php
include('head.php');
include('navbar.php');

if (!isset($_SESSION['usuario'])){
	header("Location: http://localhost:81/login.php");
}

?>
<body>
	
	<?php 
	
	$mysqli = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($mysqli));
	$results = $mysqli->query("SELECT * FROM tbeventos WHERE aprovado = 1") or die (mysqli_error($mysqli));	
	$idusuario = $_SESSION['idusuario'];
	$estaParticipando = $mysqli->query("SELECT * FROM tbeventos_participantes WHERE idparticipante != '$idusuario'") or die (mysqli_error($mysqli));	
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
	<h1>EVENTOS DISPONÍVEIS</h1>
	<div class="container">		
		<div class="col-12">
				<?php
				if (@$_GET['participacaoConfirmada']==true){
				?>
				<div class="alert-light text-danger text-center py-3">
					<?php echo $_GET['participacaoConfirmada'];?>
				</div>
				<?php
				}
				?>
			</div>
		<table class="table">
			<thead>
				
				<td>EMPRESA</td>
				<td>EVENTO</td>
				<td>CAPACIDADE</td>
				<td>LOCAL</td>
				<td>DATA</td>
				<td>HORÁRIO</td>
				<td>PARTICIPAR</td>
			</thead>
			<?php foreach ($results as $row) {?>
				<tr>
					
					<td><?php echo $row['empresa'];?></td>
					<td><?php echo $row['nome_evento'];?></td>
					<td><?php echo $row['capacidade'];?></td>
					<td><?php echo $row['local'];?></td>
					<td><?php echo $row['data'];?></td>
					<td><?php echo $row['hora'];?></td>
					<?php if ($estaParticipando):?>
						<td><a class="btn btn-success" href="process.php?participar=<?php echo $row['id'] ?>">PARTICIPAR</a></td>
					<?php else:?>
						<td><a class="btn btn-danger" href="process.php?cancelarParticipacao=<?php echo $row['id'] ?>">CANCELAR PARTICIPAÇÃO</a></td>
					<?php endif; ?>
				</tr>
			<?php }?>
		</table>		
	</div>
	
</body>
</html>