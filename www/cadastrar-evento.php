<?php
include('head.php');

// if (!isset($_SESSION['usuario'])){
// 	header("Location: http://localhost:81/login.php");
// }
// if ($_SESSION['tipo-cadastro'] == 'Visitante'){
// 	header("Location: http://localhost:81/index.php");
// }

?>
<body>	
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
		<form action="cadastrar-evento-process.php" method="post">
			<div class="form-row mb-3">
				
					<div class="form-group col-md-12">
						<label class="register-label">Nome do Evento</label>
						<input type="text" name="nome-evento" class="form-control" placeholder="Nome do Evento" required>
					</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-12">
					<label class="register-label">Empresa Organizadora</label>
					<input name="empresa-org" type="text" class="form-control" placeholder="Empresa Organizadora" >
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-2">
					<label class="register-label">Capacidade Máxima</label>				
					<input name="capacidade" type="number" class="form-control"placeholder="Capacidade Máxima" >
				</div>
				<div class="form-group col-md-6">				
					<label class="register-label">Local do Evento</label>
					<input name="local" type="text" class="form-control" placeholder="Local do Evento" >
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Data</label>
					<input name="data-evento" type="date" class="form-control" placeholder="Data do Evento" value=>
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Horário</label>
					<input name="hora-evento" type="time" class="form-control" value=>
				</div>				
			</div>
			<div class="center">
					<button type="submit" class="btn btn-success" name="cadastrar-evento">Cadastrar Evento</button>
			</div>			
		</form>	
	</div>
	
</body>
</html>