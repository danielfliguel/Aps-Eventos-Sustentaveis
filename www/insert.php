<?php 

$mysqli = new mysqli('mysql', 'root', '123456', 'eventos_milgrau') or die (mysqli_error($mysqli));

if (isset($_POST['cadastrar-evento'])){
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$horaEvento = $_POST['hora-evento'];

	$mysqli->query("INSERT INTO tbeventos (nome_evento,empresa,capacidade,local,data,hora,aprovado) VALUES ('$nomeEvento','$empresaOrg','$capacidade','$local',date('$dataEvento'),'$horaEvento',0)") or die ($mysqli->error);
	?>
	<script type='text/javascript'>alert('Solicitação enviada com sucesso');</script>
	<?php header("Location: http://localhost:81/cadastro-evento.php"); 
	exit();
}
	?>
<?php
$result = $mysqli->query("SELECT * from tbusuarios ORDER BY idusuario DESC LIMIT 1");
	foreach ($result as $value) {

	}	
$id = $value['idusuario']+1;
 
if (isset($_POST['cadastrar-usuario'])){
	$nomeUsuario = $_POST['nome-usuario'];
	$cpf = $_POST['cpf'];
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

	$mysqli->query("INSERT INTO tbusuarios (nome_usuario,cpf,sexo,data_nascimento,tipo_cadastro,senha) VALUES ('$nomeUsuario','$cpf','$sexo',date('$dataNascimento'),'$tipoCadastro','$senha')") or die ($mysqli->error);
	

	$mysqli->query("INSERT INTO tbcontato (idusuario,email,telefone,rua,numero,complemento,cidade,estado) VALUES ('$id','$email','$telefone','$rua','$numeroRua','$complemento','$cidade','$estado')") or die ($mysqli->error);
	?>
	<script type='text/javascript'>alert('Solicitação enviada com sucesso');</script>
	<?php header("Location: http://localhost:81/cadastro-evento.php"); 
	exit();
}
?>

<?php 
if (isset($_POST['cadastrar-evento'])){
	$nomeEvento = $_POST['nome-evento'];
	$empresaOrg = $_POST['empresa-org'];
	$capacidade = $_POST['capacidade'];
	$local = $_POST['local'];
	$dataEvento = $_POST['data-evento'];
	$horaEvento = $_POST['hora-evento'];	

	$mysqli->query("INSERT INTO tbeventos (nome_usuario,cpf,sexo,data_nascimento,tipo_cadastro,senha) VALUES ('$nomeUsuario','$cpf','$sexo',date('$dataNascimento'),'$tipoCadastro','$senha')") or die ($mysqli->error);
	

	$mysqli->query("INSERT INTO tbcontato (idusuario,email,telefone,rua,numero,complemento,cidade,estado) VALUES ('$id','$email','$telefone','$rua','$numeroRua','$complemento','$cidade','$estado')") or die ($mysqli->error);
	?>
	<script type='text/javascript'>alert('Solicitação enviada com sucesso');</script>
	<?php header("Location: http://localhost:81/cadastro-evento.php"); 
	exit();
}
?>

	

