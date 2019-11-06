<?php 
include('head.php');

if (isset($_SESSION['usuario'])){
	header("Location: http://localhost:81/index.php");
}

?>
<body>
	 
		
	<h1>Bem vindo à M!LG4@U Eventos</h1>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if (@$_GET['invalid']==true){
				?>
				<div class="alert-light text-danger text-center py-3">
					<?php echo $_GET['invalid'];?>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<img src="img/earth-1389715_1920.png" alt="">
			</div>
			<div class="col-4"></div>
		</div>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<form action="process/login-process.php" method="post">
					<div class="form-group">
						<label class="login-label">Login</label>
						<input type="text" class="form-control login-form" name="usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<label class="login-label">Senha</label>
						<input type="password" name="senha" class="form-control login-form" placeholder="Senha" required>	
					</div>
					<div class="form-group text-center">
						<button class="btn btn-primary" type="submit" name="login">Login</button>
					</div>	
				</form>
			</div>
			<div class="col-3"></div>				
		</div>				
	</div>
	<div class="center">
		<a style="text-align: center;"href="cadastrar-usuario.php">Não possui uma conta? Cadastre-se!</a>
	</div>	
</body>
</html>