<?php 
$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");

     session_start();
       // VERIFICAAÇÃO
   if(!isset($_SESSION['logado'])){
    header('Location: index.php');
  }
    
     //DADOS
  $id0 = $_SESSION['id_cliente'];
  $sql0 = "SELECT * FROM tb_cliente WHERE id_cliente = '$id0'";
  $resultado0 = mysqli_query($conexao, $sql0);
  $dados0 = mysqli_fetch_array($resultado0);

?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>JOBS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
     <!-- Custom styles for this template -->
     <link href="css/cover.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #perfil{
        font-size: 50px;
        color: #fafafa;
      }
      header{
        background-color: #fafafa !important;
      }
      .album{
        max-height: 90vh;
        overflow-y: auto;
        padding-bottom: 8em;
      }
    .titulo{
      font-size: 25px !important;

    }
    </style>



  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="todo">
  <header class="fixed-top">
    <div class="row">
      <div class="col py-2">
      <div class="dropdown px-2">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $dados0['img_cliente']; ?>" alt="" width="52" height="52" class="rounded-circle me-2">
        <strong class="text-dark"><?php echo $dados0['nome_cliente']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
        <li style="font-weight: bold;"><a class="dropdown-item d-none" href="#" style="font-weight: bold;">
          <?php echo $dados0['nome_cliente']; ?>
        </a></li>
        <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#alterPerfil">Alterar perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="conexao/sair.php">Sair da conta</a></li>
      </ul>
    </div>

          <i class="bi bi-person-circle d-none" id="perfil"></i>
      
      </div>
      <div class="col"><h2 class="titulo d-none">Paulo Bunga</h2></div>
      <div class="col py-2">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
        <span class="navbar-toggler-icon">
          <i class="bi bi-filter-right" style="font-size: 26px;"></i>
        </span>
      </button>
      </div>
      <hr>
    </div>
    
  </header>
  <div class="search d-flex opacidade" id="cp">
    <i class="bi bi-search"></i>
    <input type="search" name="" id="pc_pesq" placeholder="Pesquisar Serviços">
    <div class="result-pesq">
        <!--PESQUISAR-->
    </div>
  </div>
  <main class="px-1 text-start">
    <div class="bd-example">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="bi bi-bell-fill"></i> Notificações</li>
        <li class="list-group-item"><i class="bi bi-gear-fill"></i> Configurações de Conta</li>
        <li class="list-group-item"><i class="bi bi-person-plus-fill"></i> Convidar Amigos</li>
        <li class="list-group-item"><i class="bi bi-globe"></i> Idiaomas</li>
        <li class="list-group-item"><i class="bi bi-question-circle-fill"></i> Perguntas Frequentes</li>
        <li class="list-group-item"><i class="bi bi-shield-fill-check"></i> Politica de Privacidade</li>
      </ul>
      </div>
  </main>

  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">

    <div class="row py-2">

      <div class="col" style="">
        <a href="index_cliente.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="pesquisar.php" class="btn-pesq"><i class="bi bi-search text-dark"></i></a>
      </div>

      <div class="col">
        <a href="chat.php" class=""><i class="bi bi-chat-text text-dark"></i></a>
      </div>
      <div class="col">
        <a href="#" class="ativado"><i class="bi bi-person ativado"></i></a>
      </div>
    </div>
  </footer>
</div>


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">
             <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $dados0['img_cliente']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong class="text-dark" style=""><?php echo $dados0['nome_cliente']; ?></strong>
      </a>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body text-star">
           <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="bi bi-bell-fill"></i> Notificações</li>
        <li class="list-group-item"><i class="bi bi-gear-fill"></i> Configurações de Conta</li>
        <li class="list-group-item"><i class="bi bi-person-plus-fill"></i> Convidar Amigos</li>
        <li class="list-group-item"><i class="bi bi-globe"></i> Idiaomas</li>
        <li class="list-group-item"><i class="bi bi-question-circle-fill"></i> Perguntas Frequentes</li>
        <li class="list-group-item"><i class="bi bi-shield-fill-check"></i> Politica de Privacidade</li>
      </ul>
          
        </div>
      </div>

<div class="modal fade" id="alterPerfil" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Alterar Perfil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <!--TELA DE CADASTRO CLIENTE 3-->
   <form action="conexao/cadastrar.php" enctype="multipart/form-data" method="post" id="benvindo_cliente" class="" >
    <input type="hidden" name="alteid" id="alteid" value="<?php echo $dados0['id_cliente']; ?>">
    <div class="row g-3" >
      <div class="col-6">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu primeiro e ultimo nome..." value="<?php echo $dados0['nome_cliente']; ?>" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email..." value="<?php echo $dados0['email_cliente']; ?>" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="telefone" class="form-label">Contacto</label>
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite seu numero de telefone..." value="<?php echo $dados0['numero_cliente']; ?>" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="dataNace" class="form-label">Data de Nacimento</label>
        <input type="date" class="form-control" id="dataNace" name="dataNace" placeholder="sua data de nascimento" value="<?php echo $dados0['data_cliente']; ?>">
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua senha" required value="<?php echo $dados0['senha_cliente']; ?>">
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="senha2" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="senha2" name="senha2" placeholder="Sua Localidade" value="<?php echo $dados0['endereco_cliente']; ?>">
      </div>

      <div class="col-6">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Insira uma foto" value="<?php echo $dados0['img_cliente']; ?>">
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>
      <div class="col-6">
        <label for="zip" class="form-label" style="opacity: 0;">Botão</label>
        <button type="submit" class="btn btn-outline-info w-100" name="clientAlter" id="clientAlter">Cadastrar</button>
      </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Já tem uma conta?  <a href="index.php" id="btn-login-volta" class="p-1 nav-link">Iniciar sessão</a></p>
  </form>
    
    </div>
  </div>
</div>

  </body>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <script>

  </script>
</html>
