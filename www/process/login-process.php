<?php
include 'dbconnection.php'; 	
//LOGIN 
//SE FOR REALIZADA UMA TENTATIVA DE LOGIN
	
	
	//A variável $usuario armazena o que for inserido no campo usuário
	$usuario = $_POST['usuario'];
	//A variável $senha armazena o que for inserido no campo senha
	$senha = $_POST['senha'];
	//variável que armazena a busca
	$queryLogin = "SELECT * FROM dbo.tbusuarios WHERE usuario = ? AND senha = ?";	
	//Efetiva a busca no banco
	$loginParams = array($usuario,$senha);
	$getLoginResults = sqlsrv_query($conn,$queryLogin,$loginParams);
	//Trata os dados recebidos do banco
	$rowLogin = sqlsrv_fetch_array($getLoginResults, SQLSRV_FETCH_ASSOC);
	
	

	if ($rowLogin != null){
		
		//A sessão armazena o nome do usuário, o tipo de cadastro, o id do usuario e o redireciona para a página principal
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo-cadastro'] = $rowLogin['tipo_cadastro'];
		$_SESSION ['idusuario'] = $rowLogin['idusuario'];
		header("Location: http://localhost:81/index.php"); 	
	}
	else{
		//Caso o login não seja bem sucedido, redireciona o usuário para a tela de login e solicita que o mesmo digite os dados novamente
		header("Location: http://localhost:81/login.php?invalid=Informe o login e senha corretos."); 
	}

?>