<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand">MilGrau Eventos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['usuario'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        <?php endif; ?> 
        </li>
        <?php if ($_SESSION['tipo-cadastro'] != 'Visitante' && isset($_SESSION['usuario']) ): ?>
          <li class="nav-item">
            <a class="nav-link" href="cadastrar-evento.php">Cadastrar Evento</a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['usuario'])): ?>             
          <li class="nav-item">
            <a class="nav-link" href="consultar-eventos-visitante.php">Consultar Eventos</a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['tipo-cadastro'] == 'Administrador' || $_SESSION['tipo-cadastro'] == 'Gerenciador' ): ?>
          <li class="nav-item">
            <a class="nav-link" href="consultar-eventos-adm.php">Editar Eventos</a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['tipo-cadastro'] == 'Administrador' || $_SESSION['tipo-cadastro'] == 'Gerenciador' ): ?> 
          <li class="nav-item">
            <a class="nav-link" href="cadastrar-usuario.php">Cadastrar Usuários</a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['tipo-cadastro'] == 'Administrador' || $_SESSION['tipo-cadastro'] == 'Gerenciador' ): ?>
          <li class="nav-item">
            <a class="nav-link" href="consultar-usuarios.php">Consultar Usuários</a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['tipo-cadastro'] == 'Administrador' || $_SESSION['tipo-cadastro'] == 'Gerenciador' ): ?>  
          <li class="nav-item">
            <a class="nav-link" href="aprovar-eventos.php">Aprovar Eventos</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['usuario'])):?>
         <li class="nav-item">
           <a class="nav-link" href="#"><?php echo "Bem Vindo, " . $_SESSION['usuario']?></a>
         </li>
         <?php else:?>
           <li class="nav-item">
             <a class="nav-link" href="login.php">Login</a>
           </li>
         <?php endif; ?>
         <?php if (isset($_SESSION['usuario'])):?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php?logout">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav> 
</header>
<?php session_start(); ?>