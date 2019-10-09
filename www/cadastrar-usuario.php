<?php
include('head.php');
include('navbar.php');


if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
	header("Location: http://localhost:81/index.php");
}

?>

<body>
	
	<?php
	
	$mysqli = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($mysqli));
	
	$idUsuario = $_GET['editarUsuario'];
	$result = $mysqli->query("SELECT * from tbusuarios WHERE idusuario = '$idUsuario'") or die (mysqli_error($mysqli));
	$resultContato = $mysqli->query("SELECT * from tbcontato WHERE idusuario = '$idUsuario'") or die (mysqli_error($mysqli));
	foreach ($result as $value) {
		
	}
	foreach ($resultContato as $valueContato) {
		
	}
	
	?>
	<?php include_once("navbar.php"); ?>
	
	<?php if (isset($_GET['editarUsuario'])): ?>
		<h1>EDITAR USUÁRIO</h1>
	<?php else: ?>
		<h1>FORMULÁRIO DE CADASTRO</h1>
	<?php endif; ?>
	<div class="container">
		<form action="process.php" method="post">
			<div class="form-row mb-3">
				<?php if (isset($_GET['editarUsuario'])): ?>
					<div class="form-group col-md-1">
						<label class="register-label">ID</label>
						<input type="text" name="id-usuario" class="form-control" placeholder="Nome Completo" required value="<?php echo $value['idusuario'] ?>">
				</div>
					<div class="form-group col-md-5">
						<label class="register-label">Nome Completo</label>
						<input type="text" name="nome-usuario" class="form-control" placeholder="Nome Completo" required value="<?php echo $value['nome_usuario'] ?>">
				</div>
				<?php else: ?>
					<div class="form-group col-md-6">
						<label class="register-label">Nome Completo</label>
						<input type="text" name="nome-usuario" class="form-control" placeholder="Nome Completo" required value="<?php echo $value['nome_usuario'] ?>">
					</div>
				<?php endif; ?>
				<div class="form-group col-md-2">
					<label class="register-label">CPF</label>
					<input type="number" class="form-control" name="cpf" placeholder="CPF" maxlength = "11" required value="<?php echo $value['cpf'] ?>">
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Sexo</label>
					<select class="form-control" name="sexo" value="">
  						<?php if ($value['sexo']=="Feminino"):?>
	  						<option><?php echo $value['sexo'] ?></option>
	  						<option>Masculino</option>
  						<?php elseif ($value['sexo']=="Masculino"): ?>
	  						<option><?php echo $value['sexo'] ?></option>
	  						<option>Feminino</option>
	  					<?php else: ?>
	  						<option>Masculino</option>
	  						<option>Feminino</option>
  						<?php endif;?>	
					</select>
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Data de Nascimento</label>
					<input type="date" class="form-control" placeholder="Idade" name="data-nascimento" required value="<?php echo $value['data_nascimento'] ?>">
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-4">
					<label class="register-label">Email</label>
					<input type="email" class="form-control" placeholder="Email" name="email" required value="<?php echo $valueContato['email'] ?>">
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Telefone</label>
					<input type="phone" class="form-control" placeholder="Telefone" name="telefone" maxlength="11" required value="<?php echo $valueContato['telefone'] ?>">
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Senha</label>
					<input type="password" class="form-control" placeholder="Password" name="senha" required value="<?php echo $value['senha'] ?>" >
				</div>
				<div class="form-group col-md-4">
					<label class="register-label">Tipo de Cadastro</label>
					<select class="form-control" name="tipo-cadastro">
						<?php if($value['tipo_cadastro']=="Visitante"):?>
	  						<option><?php echo $value['tipo_cadastro']?></option>			
	  						<option>Empresa</option>
	  						<option>Administrador</option>
	  						<option>Gerenciador</option>
	  					<?php elseif ($value['tipo_cadastro']=="Empresa"):?>
	  						<option><?php echo $value['tipo_cadastro']?></option>			
	  						<option>Visitante</option>
	  						<option>Administrador</option>
	  						<option>Gerenciador</option>
	  					<?php elseif ($value['tipo_cadastro']=="Administrador"):?>
	  						<option><?php echo $value['tipo_cadastro']?></option>
	  						<option>Empresa</option>			
	  						<option>Visitante</option>	  						
	  						<option>Gerenciador</option>
	  					<?php elseif ($value['tipo_cadastro']=="Gerenciador"):?>
	  						<option><?php echo $value['tipo_cadastro']?></option>
	  						<option>Empresa</option>			
	  						<option>Visitante</option>
	  						<option>Administrador</option> 									
	  					<?php else: ?>
	  						<option>Empresa</option>				
	  						<option>Visitante</option>
	  					<?php endif;?>
					</select>
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-4">
					<label class="register-label">Endereço</label>				
					<input type="text" class="form-control" placeholder="Rua" name="rua" required value="<?php echo $valueContato['rua'] ?>">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Número</label>
					<input type="number" class="form-control" placeholder="Número" name="numero-rua" required value="<?php echo $valueContato['numero'] ?>">
				</div>
				<div class="form-group col-md-3">				
					<label class="register-label">Complemento</label>
					<input type="text" class="form-control" placeholder="Complemento" name="complemento" value="<?php echo $valueContato['complemento'] ?>">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Cidade</label>
					<input type="text" class="form-control" placeholder="Cidade" name="cidade" required value="<?php echo $valueContato['cidade'] ?>">
				</div>
				<div class="form-group col-md-1">				
					<label class="register-label">UF</label>
					<input type="text" class="form-control" placeholder="UF" name="estado" required value="<?php echo $valueContato['estado'] ?>">
				</div>
			</div>
			<div class="center">
				<?php if (isset($_GET['editarUsuario'])): ?>
					<button type="submit" class="btn btn-primary" name="editar-usuario">ATUALIZAR</button>					
				<?php else: ?>
					<button type="submit" class="btn btn-success" name="cadastrar-usuario">Cadastre-se</button>
				<?php endif;?>
			</div>			
		</form>	
	</div>	
</body>
</html>