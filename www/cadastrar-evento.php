<?php
include('head.php');
include('navbar.php');
if (!isset($_SESSION['usuario'])){
	header("Location: http://localhost:81/login.php");
}
if ($_SESSION['tipo-cadastro'] == 'Visitante'){
	header("Location: http://localhost:81/index.php");
}

?>
<body>
	
	<?php
	include_once("navbar.php");
	require_once 'process.php';
	$mysqli = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($mysqli));
	$idEvento = $_GET['editarEvento'];
	$result = $mysqli->query("SELECT * from tbeventos WHERE idevento = '$idEvento'") or die (mysqli_error($mysqli));
	foreach ($result as $value) {
		# code...
	}
	
	?>
	<h1>SOLICITAÇÃO DE CADASTRO DE EVENTO</h1>
	<?php
		if (@$_GET['cadastrado']==true){
		?>
		<div class="alert-light text-danger text-center py-3">
			<?php echo $_GET['cadastrado'];?>
		</div>
		<?php
		}
	?>
	<div class="container">
		<form action="process.php" method="post">
			<div class="form-row mb-3">
				<?php if (isset($_GET['editarEvento'])): ?>
					<div class="form-group col-md-1">
						<label class="register-label">ID</label>
						<input type="text" name="id-evento" class="form-control" placeholder="Nome Completo" required value="<?php echo $value['idevento'] ?>">
					</div>
					<div class="form-group col-md-9">
						<label class="register-label">Nome do Evento</label>
						<input type="text" name="nome-evento" class="form-control" placeholder="Nome do Evento" required value="<?php echo $value['nome_evento'] ?>">
					</div>
					<div class="form-group col-md-2">
						<label class="register-label">Status do Evento</label>
						<input type="text" name="status-evento" class="form-control" required value="<?php echo $value['aprovado'] ?>">
					</div>
				<?php else: ?>
					<div class="form-group col-md-12">
						<label class="register-label">Nome do Evento</label>
						<input type="text" name="nome-evento" class="form-control" placeholder="Nome do Evento" required>
					</div>
				<?php endif; ?>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-12">
					<label class="register-label">Empresa Organizadora</label>
					<input name="empresa-org" type="text" class="form-control" placeholder="Empresa Organizadora" value="<?php echo $value['empresa'] ?>">
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-2">
					<label class="register-label">Capacidade Máxima</label>				
					<input name="capacidade" type="number" class="form-control"placeholder="Capacidade Máxima" value="<?php echo $value['capacidade'] ?>">
				</div>
				<div class="form-group col-md-6">				
					<label class="register-label">Local do Evento</label>
					<input name="local" type="text" class="form-control" placeholder="Local do Evento" value="<?php echo $value['local'] ?>">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Data</label>
					<input name="data-evento" type="date" class="form-control" placeholder="Data do Evento" value="<?php echo $value['data'] ?>">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Horário</label>
					<input name="hora-evento" type="time" class="form-control" value="<?php echo $value['hora'] ?>">
				</div>				
			</div>
			<div class="center">
				<?php if (isset($_GET['editarEvento'])): ?>
					<button type="submit" class="btn btn-primary" name="editar-evento">ATUALIZAR</button>					
				<?php else: ?>
					<button type="submit" class="btn btn-success" name="cadastrar-evento">Cadastrar Evento</button>
				<?php endif;?>
			</div>			
		</form>	
	</div>
	
</body>
</html>