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
	$results = $mysqli->query("SELECT * FROM tbusuarios") or die (mysqli_error($mysqli));	
	include_once("navbar.php"); 
	require_once 'process.php';
	
	?>
	
	<h1>CONSULTAR USUÁRIOS</h1>
	<div class="container">
		<table class="table">
			<thead>
				<td>ID</td>
				<td>USUÁRIO</td>
				<?php if ($_SESSION['tipo-cadastro'] == "Administrador"):?>
					<td>EDITAR</td>
					<td>EXCLUIR</td>
				<?php endif; ?>
			</thead>
			<?php foreach ($results as $row) {?>
				<tr>
					<td><?php echo $row['idusuario'];?></td>
					<td><?php echo $row['nome_usuario'];?></td>
					<?php if ($_SESSION['tipo-cadastro'] == "Administrador"):?>
						<td><a class="btn btn-primary" href="cadastrar-usuario.php?editarUsuario=<?php echo $row['idusuario'] ?>">EDITAR</a></td>
						<td><a class="btn btn-danger" href="process.php?excluirUsuario=<?php echo $row['idusuario'] ?>">EXCLUIR</a></td>
					<?php endif; ?>
				</tr>
			<?php }?>
		</table>		
	</div> 		
</body>
</html>