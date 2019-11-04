<?php
include 'dbconnection.php'; 

//CADASTRO DE USUÁRIO
$queryId = "SELECT max(idusuario) FROM dbo.tbusuarios";
$getLastId = sqlsrv_query($conn,$queryId);

$lastId = sqlsrv_fetch_array($getLastId, SQLSRV_FETCH_ASSOC);
var_dump($lastId);


if ($lastId){
	$id = $lastId['']+1;
}
else{
	$id = 1;
}	

if (isset($_POST['cadastrar-usuario'])){

	$nomeUsuario = $_POST['nome-usuario'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['data-nascimento'];
	$dataNascimento = date('Y-m-d', $dataNascimento);
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	var_dump($dataNascimento);
	

	
	$tipoCadastro = $_POST['tipo-cadastro'];
	$rua = $_POST['rua'];
	$numeroRua = $_POST['numero-rua'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	//INSERÇÃO DOS DADOS NA TABELA tbusuarios
	$queryInsertUserData = "INSERT INTO dbo.tbusuarios (nome_usuario,cpf,sexo,data_nascimento,tipo_cadastro,senha) VALUES (?,?,?,?,?,?);";
	$insertUserParams = array($nomeUsuario,(int)$cpf,$sexo,$dataNascimento,$tipoCadastro,$senha);
	
	$insertUserData = sqlsrv_query($conn,$queryInsertUserData,$insertUserParams) or die(print_r(sqlsrv_errors()));
	
	sqlsrv_free_stmt($insertUserData);
	
	//INSERÇÃO DE DADOS NA TABELA TBCONTATO
	$queryInsertUserContact = "INSERT INTO dbo.tbcontato (idusuario,email,telefone,rua,numero,complemento,cidade,estado) VALUES (?,?,?,?,?,?,?,?)";
	$insertUserContactParams = array($id,$email,$telefone,$rua,$numeroRua,$complemento,$cidade,$estado);
	$insertUserContact = sqlsrv_query($conn,$queryInsertUserContact,$insertUserContactParams);
	sqlsrv_free_stmt($insertUserContact);
	
	if ($insertUserData && $insertUserContact) {
		header("Location: http://localhost:81/login.php?success=Usuario Criado com Sucesso");
		exit(); 
	}
	else{
		header("Location: http://localhost:81/login.php?error=Não foi possível criar o usuário.");
		exit();
	}
}
?>