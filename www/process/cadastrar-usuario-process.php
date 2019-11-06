<?php
include 'dbconnection.php'; 

//CADASTRO DE USUÁRIO




if ($lastId != null){
	$id = $lastId['']+1;
}
else{
	$id = 1;
}	



	//DADOS DA PARA TABELA tbusuarios
	$nomeUsuario = $_POST['nome-usuario'];
	$usuario = $_POST['usuario'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['data-nascimento'];
	$tipoCadastro = $_POST['tipo-cadastro'];	
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	
		
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$rua = $_POST['rua'];
	$numeroRua = $_POST['numero-rua'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];



	//INSERÇÃO DOS DADOS NA TABELA tbusuarios
	$queryInsertUserData = "INSERT INTO dbo.tbusuarios (nome_usuario,usuario,cpf,sexo,data_nascimento,tipo_cadastro,senha) VALUES (?,?,?,?,?,?,?);";
	$insertUserParams = array($nomeUsuario,$usuario,$cpf,$sexo,$dataNascimento,$tipoCadastro,$senha);
	
	$insertUserData = sqlsrv_query($conn,$queryInsertUserData,$insertUserParams) or die(print_r(sqlsrv_errors()));
	
	sqlsrv_free_stmt($insertUserData);

	$queryId = "SELECT max(idusuario) FROM dbo.tbusuarios";
	$getLastId = sqlsrv_query($conn,$queryId);
	$lastId = sqlsrv_fetch_array($getLastId, SQLSRV_FETCH_ASSOC);
	
	//INSERÇÃO DE DADOS NA TABELA TBCONTATO
	$queryInsertUserContact = "INSERT INTO dbo.tbcontato (idusuario,email,telefone,rua,numero,complemento,cidade,estado) VALUES (?,?,?,?,?,?,?,?)";
	$insertUserContactParams = array($lastId[''],$email,$telefone,$rua,$numeroRua,$complemento,$cidade,$estado);
	$insertUserContact = sqlsrv_query($conn,$queryInsertUserContact,$insertUserContactParams) or die(print_r(sqlsrv_errors()));;
	sqlsrv_free_stmt($insertUserContact);
	
	if ($insertUserData && $insertUserContact) {
		if (isset($_SESSION['usuario'])){
			header("Location: http://localhost:81/index.php?success=Usuario Criado com Sucesso");		
		}
		else{
			header("Location: http://localhost:81/login.php?success=Usuario Criado com Sucesso");
			exit(); 	
		}
		
	}		
	else{
		header("Location: http://localhost:81/login.php?error=Não foi possível criar o usuário.");
		exit();
	}

?>