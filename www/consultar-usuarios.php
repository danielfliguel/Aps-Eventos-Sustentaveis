<?php
include 'head.php';
include 'dbconnection.php';
// if (!isset($_SESSION['usuario'])){
// 	header("Location: http://localhost:81/login.php");
// }
// if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
// 	header("Location: http://localhost:81/index.php");
// }
$queryUsuarios = "SELECT * FROM dbo.tbusuarios";
$queryUsuariosResults = sqlsrv_query($conn,$queryUsuarios);

?>
<body>
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
						<td><a class="btn btn-primary" href="cadastrar-usuario.php?editarUsuario=<?php echo $rowUsuarios['idusuario'] ?>">EDITAR</a></td>
						<td><a class="btn btn-danger" href="process.php?excluirUsuario=<?php echo $rowUsuarios['idusuario'] ?>">EXCLUIR</a></td>
					<?php endif; ?>
				</tr>
			<?php }?>
		</table>		
	</div> 		
</body>
</html>