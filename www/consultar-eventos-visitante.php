<?php
include('head.php');
include('dbconnection.php');

// if (!isset($_SESSION['usuario'])){
// 	header("Location: http://localhost:81/login.php");
// }

?>
<body>
	
	<?php 
	
	$queryEventosDisponiveis = "SELECT * FROM dbo.tbeventos WHERE aprovado = 1";
	$getEventosDisponiveis = sqlsrv_query($conn,$queryEventosDisponiveis);
	$idusuario = $_SESSION['idusuario'];

	$queryVerificaParticipacao = "SELECT * FROM dbo.tbusuarios WHERE idusuario = ? AND evento_inscrito = 1";
	$paramVerificaParticipacao = array($idusuario);
	$verificaParticipacao = sqlsrv_query($conn,$queryVerificaParticipacao,$paramVerificaParticipacao);
	$rowVerificaParticipacao = sqlsrv_fetch_array($verificaParticipacao, SQLSRV_FETCH_ASSOC);
	

	
	
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
	<?php if ($rowVerificaParticipacao['evento_inscrito']==1): ?>
		<h1> VOCÊ JÁ ESTÁ INSCRITO EM UM EVENTO.</h1>
		<h2 style="color: white; text-align: center;margin-top: 20px;">DESEJA CANCELAR SUA INSCRIÇÃO?</h2>
		<a style="margin-left: 650px;margin-top: 20px;" href="cancelar-inscricao-process.php" class="btn btn-danger">CANCELAR</a>
	<?php else: ?>

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
				<td>LOCAL</td>
				<td>DETALHES</td>
			</thead>
			<?php while($rowEventosDisponiveis = sqlsrv_fetch_array($getEventosDisponiveis, SQLSRV_FETCH_ASSOC)){?>
				<tr>
					<td><?php echo $rowEventosDisponiveis['empresa'];?></td>
					<td><?php echo $rowEventosDisponiveis['nome_evento'];?></td>
					<td><?php echo $rowEventosDisponiveis['local'];?></td>
					
					<td><a class="btn btn-info" href="detalhe-evento.php?id=<?php echo $rowEventosDisponiveis['idevento'] ?>">DETALHES</a></td>
				</tr>
			<?php }?>
		</table>		
	</div>
<?php endif; ?>
	
</body>
</html>