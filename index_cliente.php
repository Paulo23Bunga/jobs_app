<?php
  $conexao = mysqli_connect('localhost','root','','jobs_bd');
  mysqli_set_charset($conexao, "utf8");

 // if(isset($_GET[]))

  //SESSÃO
	session_start();
	
  // VERIFICAAÇÃO
    if(!isset($_SESSION['logado'])){
      header('Location: index.php');
    }
    else{

        //DADOS
    $id0 = $_SESSION['id_cliente'];
    $sql0 = "SELECT * FROM tb_cliente WHERE id_cliente = '$id0'";
    $resultado0 = mysqli_query($conexao, $sql0);
    $dados0 = mysqli_fetch_array($resultado0);

    //echo json_encode($dados0) . "<br>";
  //  mysqli_close($conexao);

    }
      
  

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,900&display=swap" rel="stylesheet">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">

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
      .modal-backdrop{
  z-index: -1 !important;
 /* display: none !important; */
}
.offcanvas-body{
  text-align: left !important;
}
#espacamento{
  
}

    </style>


    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column bg-light" id="todo">
  <header class="fixed-top bg-light">
    <div class="row bg-white">
      <div class="col-3 py-2">
      <div class="dropdown px-2">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $dados0['img_cliente']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
        <li style="font-weight: bold;"><a class="dropdown-item" href="#" style="font-weight: bold;">
          <?php echo $dados0['nome_cliente']; ?>
        </a></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#alterPerfil">Alterar perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="conexao/sair.php">Sair da conta</a></li>
      </ul>
    </div>

        <a href="index_cliente.php" id="voltar" class="text-dark d-none" style="font-size: 25px; font-weight: bolder;">
          <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      <div class="col-6">
        <img src="img/logo.png" alt="" style="max-width: 100%;">
        <h2 class="titulo d-none">JOBS</h2></div>
      <div class="col-3 py-2">
         <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
        <span class="navbar-toggler-icon">
          <i class="bi bi-filter-right" style="font-size: 26px;"></i>
        </span>
      </button>
      </div>
      <hr>
    </div>
  </header>
  <div class="search d-flex d-none" id="cp">
    <i class="bi bi-search"></i>
    <input type="search" name="" id="pc_pesq" placeholder="Pesquisar Serviços">
    <div class="result-pesq">
        <!--PESQUISAR-->
    </div>
  </div>
  <main class="px-1">
    <div id="servicos" class=" text-center">
    <section class="text-center about-cols py-2" style="margin-left: -1.5em;">
      <div class="row py-0 banner" id="">
      <div class="col-4 bg-white busca" style="border-radius: 10px;">
        <img src="" alt="" style="" class="d-none">
      </div>
      <div class="col-6 py-3">
        <p class="text-start text-dark">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex error, s </p>
      </div>
    </div>

    </section>

    <p class="lead">Serviço que talvez esteja a procura</p>
    <div class="d-flex justify-content-around align-items-center flex-wrap" id="espacamento">
      <?php
          $sqlBusca = 'SELECT * FROM tb_trabalho WHERE destaque_trabalho > 0 ORDER BY destaque_trabalho DESC LIMIT 8';
          $resultado = mysqli_query($conexao, $sqlBusca);
         // $tarefas = array();
          while ($tarefa = mysqli_fetch_assoc($resultado)) {

              echo "
              <div class='trabalho' id=''>
              <a href='freelancer.php?id=$tarefa[id_trabalho]'>
              <img src='img/$tarefa[img_categoria]' alt=''>
              <p class='bg-white'>$tarefa[tipo_trabalho]</p>
              </a>

              </div>

              ";

          }


      ?>
      <!--
      <div class="trabalho" id="pic2">

      </div> -->

    </div>
  </div>

  <div id="tipoServico" class="bg-light d-none">
    <h1 class="text-secondary" style="">
      Categoria Programadores
    </h1>
    <div class="row bg-light">
      <div class="col-6 col-md-4 my-2">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/Ana.JPG" alt="">
            <h5 class="card-title text-center">Programador</h5>
            <p class="text-start"><strong>Nome:</strong></p>
            <p class="text-start"><b>Numero:</b></p>
            <p class="text-star d-nonet"><b>Endereço:</b></p>
            <a href="#" class="text-secondary text-center">Ver mais</a>
            <div class="icones text-end">
              <i class="bi bi-hand-thumbs-up"></i>
            <i class="bi bi-hand-thumbs-down"></i>
            </div>
          </div>

        </div>
      </div>
      <div class="col-6 col-md-4 my-2">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/celestino.PNG" alt="">
            <h5 class="card-title text-center">Programador</h5>
            <p class="text-start"><strong>Nome:</strong></p>
            <p class="text-start"><b>Numero:</b></p>
            <p class="text-start d-none"><b>Estado:</b></p>
            <a href="#" class="text-secondary text-center">Ver mais</a>
            <div class="icones text-end">
              <i class="bi bi-hand-thumbs-up"></i>
            <i class="bi bi-hand-thumbs-down"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 my-2">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/pic8.jpg" alt="">
            <h5 class="card-title text-center">Programador</h5>
            <p class="text-start"><strong>Nome:</strong></p>
            <p class="text-start"><b>Numero:</b></p>
            <p class="text-start d-none"><b>Estado:</b></p>
            <a href="#" class="text-secondary text-center">Ver mais</a>
            <div class="icones text-end">
              <i class="bi bi-hand-thumbs-up"></i>
            <i class="bi bi-hand-thumbs-down"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 my-2">
        <div class="card">
          <div class="card-body text-center">
            <img src="img/bit (1).png" alt="">
            <h5 class="card-title text-center">Programador</h5>
            <p class="text-start"><strong>Nome:</strong></p>
            <p class="text-start"><b>Numero:</b></p>
            <p class="text-start d-none"><b>Estado:</b></p>
            <a href="#" class="text-secondary text-center">Ver mais</a>
            <div class="icones text-end">
              <i class="bi bi-hand-thumbs-up"></i>
            <i class="bi bi-hand-thumbs-down"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>

  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">

    <div class="row py-2">

      <div class="col" style="">
        <a href="#" class="ativado"><i class="bi bi-house-door-fill ativado"></i></a>
      </div>
      <div class="col">
        <a href="pesquisar.php" class="btn-pesq"><i class="bi bi-search text-dark"></i></a>
      </div>

      <div class="col">
        <a href="chat.php" class=""><i class="bi bi-chat-text text-dark"></i></a>
      </div>
      <div class="col">
        <a href="perfil.php" class=""><i class="bi bi-person text-dark"></i></a>
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
        <!--MODAL ALTERAR PERFIL-->
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
        <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Insira uma foto" required value="<?php echo $dados0['img_cliente']; ?>">
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
  <script src="js/index.js"></script>
  <script>

  </script>
</html>
