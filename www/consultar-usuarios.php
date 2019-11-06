<?php
include 'head.php';
include 'process/dbconnection.php';

if (!isset($_SESSION['usuario'])){
	header("Location: http://localhost:81/login.php");
}
if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
	header("Location: http://localhost:81/index.php");
}

$queryUsuarios = "SELECT * FROM dbo.tbusuarios";
$queryUsuariosResults = sqlsrv_query($conn,$queryUsuarios);

?>
<body>
	<?php
	if (@$_GET['success']==true){
		?>
		<div class="alert-light text-danger text-center py-3">
			<?php echo $_GET['success'];?>
		</div>
		<?php
	}
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
			<?php while($rowUsuario = sqlsrv_fetch_array($queryUsuariosResults, SQLSRV_FETCH_ASSOC)){?>
				<tr>
					<td><?php echo $rowUsuario['idusuario'];?></td>
					<td><?php echo $rowUsuario['nome_usuario'];?></td>
					<?php if ($_SESSION['tipo-cadastro'] == "Administrador"):?>
						<td><a class="btn btn-primary" href="editar-usuario.php?editarUsuario=<?php echo $rowUsuario['idusuario'] ?>">EDITAR</a></td>
						<td><a class="btn btn-danger" href="/process/excluir-usuario-process.php?excluirUsuario=<?php echo $rowUsuario['idusuario'] ?>">EXCLUIR</a></td>
					<?php endif; ?>
				</tr>
			<?php }?>
		</table>		
	</div> 		
</body>
</html>