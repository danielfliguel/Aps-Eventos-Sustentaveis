<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
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
	
	
	include_once("navbar.php"); ?>
	<h1>FORMULÁRIO DE CADASTRO</h1>
	<div class="container">
		<form action="process.php" method="post">
			<div class="form-row mb-3">
				<div class="form-group col-md-6">
					<label class="register-label">Nome Completo</label>
					<input type="text" name="nome-usuario" class="form-control" placeholder="Nome Completo" required value="<?php echo $value['nome_usuario'] ?>">
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">CPF</label>
					<input type="number" class="form-control" name="cpf" placeholder="CPF" maxlength = "11" required value="<?php echo $value['cpf'] ?>">
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Sexo</label>
					<select class="form-control" name="sexo" value="<?php echo $value['sexo'] ?>">
  						<option>Masculino</option>
  						<option>Feminino</option>
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
					<select class="form-control" name="tipo-cadastro" value="<?php echo $value['tipo_cadastro'] ?>">
  						<option>Visitante</option>
  						<option>Empresa</option>
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
				<a href="process.php?editarUsuario=<?php echo $_GET['editarUsuario'] ?>" class="btn btn-primary" name="atualizarCadastro">ATUALIZAR</a>
			</div>			
		</form>	
	</div>
	
</body>
</html>