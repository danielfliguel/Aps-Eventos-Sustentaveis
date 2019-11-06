<?php
include('head.php');
include 'process/dbconnection.php';


if (!isset($_SESSION['usuario'])){
	header("Location: http://localhost:81/login.php");
}
if ($_SESSION['tipo-cadastro'] != 'Administrador'){
	header("Location: http://localhost:81/index.php");
}

?>
<body>
	
<?php


$idUsuario = (int)$_GET['editarUsuario'];

$queryUsuario = "SELECT * from dbo.tbusuarios WHERE idusuario = ?";
$queryUsuarioParam = array($idUsuario);
$getUsuario = sqlsrv_query($conn,$queryUsuario,$queryUsuarioParam) or die(print_r(sqlsrv_errors()));
$rowUsuario = sqlsrv_fetch_array($getUsuario, SQLSRV_FETCH_ASSOC);


$queryContatoUsuario = "SELECT * from dbo.tbcontato WHERE idusuario = ?";
$queryContatoUsuarioParam = array($idUsuario);

$getContatoUsuario = sqlsrv_query($conn,$queryContatoUsuario,$queryContatoUsuarioParam) or die(print_r(sqlsrv_errors()));
$rowContatoUsuario = sqlsrv_fetch_array($getContatoUsuario, SQLSRV_FETCH_ASSOC);


$convertDateQuery =	"SELECT convert(varchar(10),data_nascimento,121) FROM tbusuarios WHERE idusuario = ?";
$convertDateQueryParam = array($idUsuario);
$getConvertedDate = sqlsrv_query($conn,$convertDateQuery,$convertDateQueryParam);
$rowConvertedDate = sqlsrv_fetch_array($getConvertedDate, SQLSRV_FETCH_ASSOC);		
?>
<h1>EDITAR USUÁRIO</h1>
<div class="container">
<form action="process/editar-usuario-process.php" method="post">
<div class="form-row mb-3">

<div class="form-group col-md-1">
<label class="register-label">ID</label>
<input type="text" name="id-usuario" class="form-control" placeholder="Nome Completo" required value="<?php echo $rowUsuario['idusuario'] ?>">
</div>
<div class="form-group col-md-5">
<label class="register-label">Nome Completo</label>
<input type="text" name="nome-usuario" class="form-control" placeholder="Nome Completo" required value="<?php echo $rowUsuario['nome_usuario'] ?>">
</div>

<div class="form-group col-md-2">
<label class="register-label">CPF</label>
<input type="number" class="form-control" name="cpf" placeholder="CPF" maxlength = "11" required value="<?php echo $rowUsuario['cpf'] ?>">
</div>
<div class="form-group col-md-2">
<label class="register-label">Sexo</label>
<select class="form-control" name="sexo" value="">
<?php if ($rowUsuario['sexo']=="Feminino"):?>
<option><?php echo $rowUsuario['sexo'] ?></option>
<option>Masculino</option>
<?php elseif ($rowUsuario['sexo']=="Masculino"): ?>
	<option><?php echo $rowUsuario['sexo'] ?></option>
	<option>Feminino</option>
	<?php else: ?>
		<option>Masculino</option>
		<option>Feminino</option>
	<?php endif;?>	
</select>
</div>
<?php

// var_dump($rowConvertedDate);

?>
<div class="form-group col-md-2">
<label class="register-label">Data de Nascimento</label>
<input type="date" class="form-control" placeholder="Idade" name="data-nascimento" required value="<?php echo $rowConvertedDate[''] ?>">
</div>
</div>
<div class="form-row mb-3">
<div class="form-group col-md-4">
<label class="register-label">Email</label>
<input type="email" class="form-control" placeholder="Email" name="email" required value="<?php echo $rowContatoUsuario['email'] ?>">
</div>
<div class="form-group col-md-2">
<label class="register-label">Telefone</label>
<input type="phone" class="form-control" placeholder="Telefone" name="telefone" maxlength="11" required value="<?php echo $rowContatoUsuario['telefone'] ?>">
</div>
<div class="form-group col-md-2">
<label class="register-label">Senha</label>
<input type="password" class="form-control" placeholder="Password" name="senha" required value="<?php echo $rowUsuario['senha'] ?>" >
</div>
<div class="form-group col-md-4">
<label class="register-label">Tipo de Cadastro</label>
<select class="form-control" name="tipo-cadastro">
	<?php if($rowUsuario['tipo_cadastro']=="Visitante"):?>
		<option><?php echo $rowUsuario['tipo_cadastro']?></option>			
		<option>Empresa</option>
		<option>Administrador</option>
		<option>Gerenciador</option>
		<?php elseif ($rowUsuario['tipo_cadastro']=="Empresa"):?>
			<option><?php echo $rowUsuario['tipo_cadastro']?></option>			
			<option>Visitante</option>
			<option>Administrador</option>
			<option>Gerenciador</option>
			<?php elseif ($rowUsuario['tipo_cadastro']=="Administrador"):?>
				<option><?php echo $rowUsuario['tipo_cadastro']?></option>
				<option>Empresa</option>			
				<option>Visitante</option>	  						
				<option>Gerenciador</option>
				<?php elseif ($rowUsuario['tipo_cadastro']=="Gerenciador"):?>
					<option><?php echo $rowUsuario['tipo_cadastro']?></option>
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
				<input type="text" class="form-control" placeholder="Rua" name="rua" required value="<?php echo $rowContatoUsuario['rua'] ?>">
			</div>
			<div class="form-group col-md-2">				
				<label class="register-label">Número</label>
				<input type="number" class="form-control" placeholder="Número" name="numero-rua" required value="<?php echo $rowContatoUsuario['numero'] ?>">
			</div>
			<div class="form-group col-md-3">				
				<label class="register-label">Complemento</label>
				<input type="text" class="form-control" placeholder="Complemento" name="complemento" value="<?php echo $rowContatoUsuario['complemento'] ?>">
			</div>
			<div class="form-group col-md-2">				
				<label class="register-label">Cidade</label>
				<input type="text" class="form-control" placeholder="Cidade" name="cidade" required value="<?php echo $rowContatoUsuario['cidade'] ?>">
			</div>
			<div class="form-group col-md-1">				
				<label class="register-label">UF</label>
				<input type="text" class="form-control" placeholder="UF" name="estado" required value="<?php echo $rowContatoUsuario['estado'] ?>">
			</div>
		</div>
		<div class="center">
			
			<button type="submit" class="btn btn-primary" name="editar-usuario">ATUALIZAR</button>					
			
		</div>			
	</form>	
</div>	
</body>
</html>