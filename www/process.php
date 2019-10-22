<?php 

session_start();
$mysqli = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($mysqli));


//CADASTRO DE EVENTO
if (isset($_POST['cadastrar-evento'])){
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$horaEvento = $_POST['hora-evento'];

	$mysqli->query("INSERT INTO tbeventos (nome_evento,empresa,capacidade,local,data,hora,aprovado) VALUES ('$nomeEvento','$empresaOrg','$capacidade','$local',date('$dataEvento'),'$horaEvento',0)") or die ($mysqli->error);
	
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

	$mysqli->query("UPDATE tbeventos SET nome_evento = '$nomeEvento', empresa = '$empresaOrg', capacidade = '$capacidade', local = '$local', data = date('$dataEvento'), hora = '$horaEvento', aprovado = '$statusEvento' WHERE idevento = '$idEvento'") or die ($mysqli->error);	
	
	header("Location: http://localhost:81/consultar-eventos-adm.php"); 
	
}
//EXCLUIR EVENTO
//REMOVER USUÁRIO
if (isset($_GET['excluirEvento'])){
	$idEvento = $_GET['excluirEvento'];	
	

	$mysqli->query("DELETE FROM tbeventos WHERE idevento = '$idEvento' ") or die ($mysqli->error);			
	
	header("Location: http://localhost:81/consultar-eventos-adm.php"); 
	
}
//CADASTRO DE USUÁRIO
$result = $mysqli->query("SELECT * from tbusuarios ORDER BY idusuario DESC LIMIT 1");
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
	$senha = $_POST['senha'];

	$hashSenha = password_hash($senha, PASSWORD_DEFAULT);

	$tipoCadastro = $_POST['tipo-cadastro'];
	$rua = $_POST['rua'];
	$numeroRua = $_POST['numero-rua'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];



	$mysqli->query("INSERT INTO tbusuarios (nome_usuario,cpf,sexo,data_nascimento,tipo_cadastro,senha) VALUES ('$nomeUsuario','$cpf','$sexo',date('$dataNascimento'),'$tipoCadastro','$hashSenha')") or die ($mysqli->error);
	

	$mysqli->query("INSERT INTO tbcontato (idusuario,email,telefone,rua,numero,complemento,cidade,estado) VALUES ('$id','$email','$telefone','$rua','$numeroRua','$complemento','$cidade','$estado')") or die ($mysqli->error);
	?>
	<script type='text/javascript'>alert('Solicitação enviada com sucesso');</script>
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

	
	

	$mysqli->query("UPDATE tbusuarios SET nome_usuario = '$nomeUsuario' ,cpf = '$cpf' ,sexo = '$sexo' ,data_nascimento = date('$dataNascimento') ,tipo_cadastro = '$tipoCadastro' ,senha = '$hashSenha'  WHERE idusuario = '$idUsuario' ") or die ($mysqli->error);
	

	$mysqli->query("UPDATE tbcontato SET email = '$email' ,telefone = '$telefone',rua = '$rua',numero = '$numeroRua',complemento = '$complemento',cidade = '$cidade',estado = '$estado' WHERE  idusuario = '$idUsuario'") or die ($mysqli->error);
	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	
}

//REMOVER USUÁRIO
if (isset($_GET['excluirUsuario'])){
	$idUsuario = $_GET['excluirUsuario'];	
	

	$mysqli->query("DELETE FROM tbusuarios WHERE idusuario = '$idUsuario' ") or die ($mysqli->error);	
	$mysqli->query("DELETE FROM tbcontato WHERE idusuario = '$idUsuario' ") or die ($mysqli->error);	
	
	header("Location: http://localhost:81/consultar-usuarios.php"); 
	
}

//LOGIN 
if (isset($_POST['login'])){
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	//(password_verify($senha, $password_hash)

	//$hashSenha = password_hash($senha, PASSWORD_DEFAULT);


		$result = $mysqli->query("SELECT * FROM tbusuarios where nome_usuario = '$usuario' and senha = '$senha'") or die ($mysqli->error);
	foreach ($result as $value) {
		# code...*/
	}
	if ($value['nome_usuario'] == $usuario &&  $value['senha'] == $senha){
		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo-cadastro'] = $value['tipo_cadastro'];
		$_SESSION ['idusuario'] = $value['idusuario'];
		header("Location: http://localhost:81/cadastrar-evento.php"); 	
	}
	else{
		header("Location: http://localhost:81/login.php?invalid=Informe o login e senha corretos."); 
	}
}

//APROVAÇÃO DE EVENTO
if (isset($_GET['aprovar'])){
	$idEvento = $_GET['aprovar'];
	$mysqli->query("UPDATE tbeventos SET aprovado = 1 WHERE idevento = '$idEvento'");
	header("Location: http://localhost:81/aprovar-eventos.php?aprovado=EVENTO APROVADO COM SUCESSO");

}

//PARTICIPAR DE UM EVENTO
if (isset($_GET['participar'])){
	$idEvento = $_GET['participar'];
	$idParticipante = $_SESSION['idusuario'];
	$mysqli->query("INSERT INTO tbeventos_participantes (idparticipante,idevento) VALUES ('$idParticipante','$idEvento')") or die (mysqli_error($mysqli));
	header("Location: http://localhost:81/consultar-eventos.php?participacaoConfirmada=PARTICIPAÇÃO CONFIRMADA");

}

?>

	

