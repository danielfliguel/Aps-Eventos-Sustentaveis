<?php
include 'dbconnection.php';


	$idUsuario = (int) $_POST['id-usuario'];	
	$nomeUsuario = $_POST['nome-usuario'];
	$cpf = (int)$_POST['cpf'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['data-nascimento'];
	$dataNascimento = date('Y-m-d', $dataNascimento);
	$email = $_POST['email'];	
	$telefone = $_POST['telefone'];
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT) ;

	$hashSenha = password_hash($senha, PASSWORD_DEFAULT);

	$tipoCadastro = $_POST['tipo-cadastro'];
	$rua = $_POST['rua'];
	$numeroRua = $_POST['numero-rua'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	
	
	$updateUserQuery = "UPDATE dbo.tbusuarios SET nome_usuario = ? ,cpf = ? ,sexo = ? ,data_nascimento = ? ,tipo_cadastro = ? ,senha = ?  WHERE idusuario = ?"; 
	$updateUserQueryParams = array($nomeUsuario, $cpf, $sexo, $dataNascimento, $tipoCadastro, $senha, $idUsuario );
	$updateUser = sqlsrv_query($conn,$updateUserQuery,$updateUserQueryParams);
	sqlsrv_free_stmt($updateUser);

	$updateUserContactQuery = "UPDATE dbo.tbcontato SET email = ? ,telefone = ?,rua = ?,numero = ?,complemento = ?,cidade = ?,estado = ? WHERE  idusuario = ?";
	$updateUserContactParams = array($email,$telefone,$rua,$numeroRua,$complemento,$cidade,$estado,$idUsuario);
	var_dump($updateUserContactParams);
	$updateUserContact = sqlsrv_query($conn,$updateUserContactQuery,$updateUserContactParams);
	sqlsrv_free_stmt($updateUserContact);
	var_dump($updateUserContact);
		

	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	

?>