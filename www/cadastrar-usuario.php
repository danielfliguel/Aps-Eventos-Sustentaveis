<?php
include('head.php');


if ($_SESSION['tipo-cadastro'] == 'Visitante' || $_SESSION['tipo-cadastro'] == 'Empresa'){
	header("Location: http://localhost:81/index.php");
}

?>

<body>
	
	<h1>FORMULÁRIO DE CADASTRO</h1>
	
	<div class="container">
		<form action="process/cadastrar-usuario-process.php" method="post">
			<div class="form-row mb-3">
				
				<div class="form-group col-md-6">
					<label class="register-label">Nome Completo</label>
					<input type="text" name="nome-usuario" class="form-control" placeholder="Nome Completo" required>
				</div>
				
				<div class="form-group col-md-2">
					<label class="register-label">CPF</label>
					<input type="number" class="form-control" name="cpf" placeholder="CPF" maxlength = "11" required >
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Sexo</label>
					<select class="form-control" name="sexo" value="">
						<option>Masculino</option>
						<option>Feminino</option>  						
					</select>
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Data de Nascimento</label>
					<input type="date" class="form-control" placeholder="Idade" name="data-nascimento" required>
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-4">
					<label class="register-label">Email</label>
					<input type="email" class="form-control" placeholder="Email" name="email" required>
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Telefone</label>
					<input type="phone" class="form-control" placeholder="Telefone" name="telefone" maxlength="11" required>
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Senha</label>
					<input type="password" class="form-control" placeholder="Password" name="senha" required>
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Tipo de Cadastro</label>
					<select class="form-control" name="tipo-cadastro">
						<option>Empresa</option>				
						<option>Visitante</option>	  					
					</select>
				</div>
				<div class="form-group col-md-2">
					<label class="register-label">Usuário</label>
					<input type="text" class="form-control" placeholder="Nome de usuário" name="usuario" required>
				</div>
			</div>
			<div class="form-row mb-3">
				<div class="form-group col-md-4">
					<label class="register-label">Endereço</label>				
					<input type="text" class="form-control" placeholder="Rua" name="rua" required>
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Número</label>
					<input type="number" class="form-control" placeholder="Número" name="numero-rua" required>
				</div>
				<div class="form-group col-md-3">				
					<label class="register-label">Complemento</label>
					<input type="text" class="form-control" placeholder="Complemento" name="complemento">
				</div>
				<div class="form-group col-md-2">				
					<label class="register-label">Cidade</label>
					<input type="text" class="form-control" placeholder="Cidade" name="cidade" required>
				</div>
				<div class="form-group col-md-1">				
					<label class="register-label">UF</label>
					<input type="text" class="form-control" placeholder="UF" name="estado" required>
				</div>
			</div>
			<div class="center">
				
				<button type="submit" class="btn btn-success" name="cadastrar-usuario">Cadastre-se</button>
				
			</div>			
		</form>	
	</div>	
</body>
</html>