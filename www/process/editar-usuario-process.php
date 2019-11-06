<?php
include 'dbconnection.php';


	$idUsuario = (int) $_POST['id-usuario'];	
	$nomeUsuario = $_POST['nome-usuario'];
	$cpf = (int)$_POST['cpf'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['data-nascimento'];
	
	$email = $_POST['email'];	
	$telefone = $_POST['telefone'];
	$senha = $_POST['senha'];

	

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
		

	
	header("Location: http://localhost:81/consultar-usuarios.php?success=USUÁRIO EDITADO COM SUCESSO"); 
	

?>