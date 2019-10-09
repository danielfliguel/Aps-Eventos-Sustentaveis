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

