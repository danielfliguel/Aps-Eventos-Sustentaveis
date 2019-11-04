<?php 
require_once ('head.php');

// include 'navbar.php';
echo $_SESSION['idusuario'];
?>

<h1>BEM VINDO <?php echo $_SESSION['usuario']; ?></h1>
<?php echo $_SESSION['tipo-cadastro']; ?>