<?php
include 'dbconnection.php'; 	
//LOGIN 
//SE FOR REALIZADA UMA TENTATIVA DE LOGIN
if (isset($_POST['login'])){
	//A variável $usuario armazena o que for inserido no campo usuário
	$usuario = $_POST['usuario'];
	//A variável $senha armazena o que for inserido no campo senha
	$senha = $_POST['senha'];
	//variável que armazena a busca
	$queryLogin = "SELECT * FROM dbo.tbusuarios WHERE nome_usuario = ?";	
	//Efetiva a busca no banco
	$loginParams = array($usuario);
	$getLoginResults = sqlsrv_query($conn,$queryLogin,$loginParams);
	//Trata os dados recebidos do banco
	$rowLogin = sqlsrv_fetch_array($getLoginResults, SQLSRV_FETCH_ASSOC);
	
	// foreach ($result as $value) {
	// 	# code...*/
	// }
	//Variável que compara a senha digitada com a senha criptografada no banco
	$success = password_verify($senha, $rowLogin['senha']);
	
	//Se a comaração retornar true, inicia a sessão.
	if ($success){
		
		//A sessão armazena o nome do usuário, o tipo de cadastro, o id do usuario e o redireciona para a página principal
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo-cadastro'] = $value['tipo_cadastro'];
		$_SESSION ['idusuario'] = $value['idusuario'];
		header("Location: http://localhost:81/index.php"); 	
	}
	else{
		//Caso o login não seja bem sucedido, redireciona o usuário para a tela de login e solicita que o mesmo digite os dados novamente
		header("Location: http://localhost:81/login.php?invalid=Informe o login e senha corretos."); 
	}
}
?>