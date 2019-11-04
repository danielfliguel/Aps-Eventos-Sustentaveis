
<?php
include('head.php');
include('dbconnection.php');
// if (!isset($_SESSION['usuario'])){
// 	header("Location: http://localhost:81/login.php");
// }
// if ($_SESSION['tipo-cadastro'] == 'Visitante'){
// 	header("Location: http://localhost:81/index.php");
// }

?>
<body>
	
	<?php
	
	
	$idEvento = (int) $_GET['editarEvento'];
	var_dump($idEvento);
	$queryEvento = "SELECT * from dbo.tbeventos WHERE idevento = ?";
	$paramEvento = array($idEvento);
	$getEvento = sqlsrv_query($conn,$queryEvento,$paramEvento);
	$rowEvento = sqlsrv_fetch_array($getEvento, SQLSRV_FETCH_ASSOC);
	var_dump($rowEvento);
	
	$convertDateQuery =	"SELECT convert(varchar(10),data,121) FROM dbo.tbeventos WHERE idevento = ?";
	$convertDateQueryParam = array($idEvento);
	$getConvertedDate = sqlsrv_query($conn,$convertDateQuery,$convertDateQueryParam);
	$rowConvertedDate = sqlsrv_fetch_array($getConvertedDate, SQLSRV_FETCH_ASSOC);

	$convertTimeQuery = "SELECT CONVERT(VARCHAR(5), hora, 108) FROM dbo.tbeventos WHERE idevento = ?";
	$convertTimeParam = $convertDateQueryParam;
	$getConvertedTime = sqlsrv_query($conn,$convertTimeQuery,$convertTimeParam);
	$rowConvertedTime = sqlsrv_fetch_array($getConvertedTime, SQLSRV_FETCH_ASSOC);

	
	?>
	<h1>EDITAR EVENTO</h1>
	
	<div class="container">
		<form action="editar-evento-process.php" method="post">
			<div class="form-row mb-3">
					<div class="form-group col-md-1">
						<label class="register-label">ID</label>
						<input type="text" name="id-evento" class="form-control" placeholder="Nome Completo" required value="<?php echo $rowEvento['idevento'] ?>">
					</div>
					<div class="form-group col-md-9">
						<label class="register-label">Nome do Evento</label>
						<input type="text" name="nome-evento" class="form-control" placeholder="Nome do Evento" required value="<?php echo $rowEvento['nome_evento'] ?>">
					</div>
					<div class="form-group col-md-2">
						<label class="register-label">Status do Evento</label>
						<input type="text" name="status-evento" class="form-control" required value="<?php echo $rowEvento['aprovado'] ?>">
					</div>
				
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-12">
					<label class="register-label">Empresa Organizadora</label>
					<input name="empresa-org" type="text" class="form-control" placeholder="Empresa Organizadora" value="<?php echo $rowEvento['empresa'] ?>">
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-2">
					<label class="register-label">Capacidade Máxima</label>				
					<input name="capacidade" type="number" class="form-control"placeholder="Capacidade Máxima" value="<?php echo $rowEvento['capacidade'] ?>">
				</div>
				<div class="form-group col-md-6">				
					<label class="register-label">Local do Evento</label>
					<input name="local" type="text" class="form-control" placeholder="Local do Evento" value="<?php echo $rowEvento['local'] ?>">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Data</label>
					<input name="data-evento" type="date" class="form-control" placeholder="Data do Evento" value="<?php echo $rowConvertedDate[''] ?>">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Horário</label>
					<input name="hora-evento" type="time" class="form-control" value="<?php echo $rowConvertedTime[''] ?>">
				</div>				
			</div>
			<div class="center">
				<button type="submit" class="btn btn-primary" name="editar-evento">ATUALIZAR</button>					
				
			</div>			
		</form>	
	</div>
	
</body>
</html>