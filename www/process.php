<?php 

session_start();
// $conn = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($conn));

$serverName = "mysql-milgrau.database.windows.net";
$connectionOptions = array("Database"=>"eventos_milgrau",
	"Uid"=>"milgrau",
	"PWD"=>"Mil45678"
);
$conn = sqlsrv_connect($serverName,$connectionOptions);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";
// $result = sqlsrv_query($conn,"SELECT * FROM dbo.tbusuarios");
// sqlsrv_fetch_array($result);
// var_dump($result);


// die();


//CADASTRO DE EVENTO
if (isset($_POST['cadastrar-evento'])){
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$horaEvento = $_POST['hora-evento'];

	sqlsrv_query($conn,"INSERT INTO tbeventos (nome_evento,empresa,capacidade,local,data,hora,aprovado) VALUES ('$nomeEvento','$empresaOrg','$capacidade','$local',date('$dataEvento'),'$horaEvento',0)");
	
	header("Location: http://localhost:81/cadastrar-evento.php?cadastrado=SOLICITAÇÃO ENVIADA COM SUCESSO"); 
	
}
//EDITAR EVENTO
if (isset($_POST['editar-evento'])){
	$idEvento = (int) $_POST['id-evento'];
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$horaEvento = $_POST['hora-evento'];
	$statusEvento = $_POST['status-evento'];

	sqlsrv_query($conn,"UPDATE tbeventos SET nome_evento = '$nomeEvento', empresa = '$empresaOrg', capacidade = '$capacidade', local = '$local', data = date('$dataEvento'), hora = '$horaEvento', aprovado = '$statusEvento' WHERE idevento = '$idEvento'");	
	
	header("Location: http://localhost:81/consultar-eventos-adm.php"); 
	
}
//EXCLUIR EVENTO
//REMOVER USUÁRIO
if (isset($_GET['excluirEvento'])){
	$idEvento = $_GET['excluirEvento'];	
	

	sqlsrv_query($conn,"DELETE FROM tbeventos WHERE idevento = '$idEvento' ");			
	
	header("Location: http://localhost:81/consultar-eventos-adm.php"); 
	
}
//CADASTRO DE USUÁRIO
$result = sqlsrv_query($conn,"SELECT * from tbusuarios ORDER BY idusuario DESC LIMIT 1");
	foreach ($result as $value) {

	}
if ($result){
	$id = $value['idusuario']+1;
}
else{
	$id = 1;
}	

if (isset($_POST['cadastrar-usuario'])){

	$nomeUsuario = $_POST['nome-usuario'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['data-nascimento'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	
	$tipoCadastro = $_POST['tipo-cadastro'];
	$rua = $_POST['rua'];
	$numeroRua = $_POST['numero-rua'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];



	sqlsrv_query($conn,"INSERT INTO tbusuarios (nome_usuario,cpf,sexo,data_nascimento,tipo_cadastro,senha) VALUES ('$nomeUsuario','$cpf','$sexo',date('$dataNascimento'),'$tipoCadastro','$senha')");
	

	sqlsrv_query($conn,"INSERT INTO tbcontato (idusuario,email,telefone,rua,numero,complemento,cidade,estado) VALUES ('$id','$email','$telefone','$rua','$numeroRua','$complemento','$cidade','$estado')");
	?>
	
	<?php header("Location: http://localhost:81/login.php"); 
	exit();
}

//EDITAR USUÁRIO
if (isset($_POST['editar-usuario'])){
	$idUsuario = (int) $_POST['id-usuario'];	
	$nomeUsuario = $_POST['nome-usuario'];
	var_dump($nomeUsuario);
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$dataNascimento = $_POST['data-nascimento'];
	$email = $_POST['email'];	
	$telefone = $_POST['telefone'];
	$senha = $_POST['senha'];

	$hashSenha = password_hash($senha, PASSWORD_DEFAULT);

	$tipoCadastro = $_POST['tipo-cadastro'];
	$rua = $_POST['rua'];
	$numeroRua = $_POST['numero-rua'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	
	

	sqlsrv_query($conn,"UPDATE tbusuarios SET nome_usuario = '$nomeUsuario' ,cpf = '$cpf' ,sexo = '$sexo' ,data_nascimento = date('$dataNascimento') ,tipo_cadastro = '$tipoCadastro' ,senha = '$hashSenha'  WHERE idusuario = '$idUsuario' ");
	

	sqlsrv_query($conn,"UPDATE tbcontato SET email = '$email' ,telefone = '$telefone',rua = '$rua',numero = '$numeroRua',complemento = '$complemento',cidade = '$cidade',estado = '$estado' WHERE  idusuario = '$idUsuario'");
	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	
}

//REMOVER USUÁRIO
if (isset($_GET['excluirUsuario'])){
	$idUsuario = $_GET['excluirUsuario'];	
	

	sqlsrv_query($conn,"DELETE FROM tbusuarios WHERE idusuario = '$idUsuario' ");	
	sqlsrv_query($conn,"DELETE FROM tbcontato WHERE idusuario = '$idUsuario' ");	
	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	
}


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
	$success = password_verify($senha, $value['senha']);
	
	//Se a comaração retornar true, inicia a sessão.
	if ($senha == $rowLogin['senha']){
		
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


//APROVAÇÃO DE EVENTO
if (isset($_GET['aprovar'])){
	$idEvento = $_GET['aprovar'];
	sqlsrv_query($conn,"UPDATE tbeventos SET aprovado = 1 WHERE idevento = '$idEvento'");
	header("Location: http://localhost:81/aprovar-eventos.php?aprovado=EVENTO APROVADO COM SUCESSO");

}

//PARTICIPAR DE UM EVENTO
if (isset($_GET['participar'])){
	$idEvento = $_GET['participar'];
	$idParticipante = $_SESSION['idusuario'];
	sqlsrv_query($conn,"INSERT INTO tbeventos_participantes (idparticipante,idevento) VALUES ('$idParticipante','$idEvento')");
	header("Location: http://localhost:81/consultar-eventos.php?participacaoConfirmada=PARTICIPAÇÃO CONFIRMADA");

}

?>

	

