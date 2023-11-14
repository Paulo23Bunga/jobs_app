<?php
   $conexao = mysqli_connect('localhost','root','','jobs_bd');
   mysqli_set_charset($conexao, "utf8");
   session_start();

     // VERIFICAAÇÃO
     if(!isset($_SESSION['logado'])){
      header('Location: index.php');
    }

        $sqlCategoria = "SELECT * FROM tb_trabalho";
        $resulCategoria = mysqli_query($conexao, $sqlCategoria);
       // $tarefas = array();
        while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
         //   $tarefas[] = $tarefa;
           // echo $categoria['tipo_trabalho'];
          //  echo json_encode($categoria) . "<br>";
        }

             //DADOS
    $id0 = $_SESSION['freeID'];
    $sql0 = "SELECT * FROM tb_prestador WHERE id_prestador = '$id0'";
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

      main{
  margin-top: 15vh;
}
    .categoria{
        border-bottom: 3px solid #3a9ced;
        color: #3a9ced;

    }
    .list-group-item{
        background-color: rgba(250, 250, 250, .6);
        border-left: none;
        border-top: none;
        border-right: none;
    }
    input{
        color: black;
    }
    #pc_pesq{
        color: black !important;

        opacity: 1;
    }
    .badge img{
      width: 100px;
      height: auto;
      border-radius: 15px;
    }
    #buscar{
      color: black !important;
    }

    .list-group{
      max-height: 70vh;
      overflow-y: auto;
    }
    .list-group a{
      text-decoration: none;
    }

    </style>



  </head>
  <body class="d-flex h-100 text-center text-black">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="todo">
  <header class="fixed-top">
    <div class="row bg-white">
        <div class="col-3 py-2">
        <div class="dropdown px-2">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $dados0['img_prestador']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#" style="font-weight: bold;">
        <?php echo $dados0['nome_prestador']; ?>
        </a></li>
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="index.php">Sair da conta</a></li>
      </ul>
    </div>
          <a href="index_free.php" id="voltar" class="text-dark d-none" style="font-size: 25px; font-weight: bolder;">
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
      <form action="" method="post">
        <div class="search d-flex" id="cp">

          <button type="submit" name="pesq" id="pesq" class="btn btn-sm btn-default">
            <i class="bi bi-search"></i>
          </button>
          <input type="search" name="buscar" id="buscar" class="text-dark w-100" id="pc_pesq" placeholder="Pesquisar Serviços">
          <div class="result-pesq">
              <!--PESQUISAR-->
          </div>
        </div>
      </form>

  </header>

  <main class="text-start">
    <section id="categoria" class="">
      <div class="categoria text-center">
         <h4 >Categorias</h4>
      </div>
      <ol class="list-group">

      <?php
          if(isset($_POST['pesq'])){
            $texto = $_POST['buscar'];

          //  echo $texto;
            $sqlCategoria = "SELECT * FROM tb_trabalho WHERE tipo_trabalho LIKE  '%$texto%'";
            $resulCategoria = mysqli_query($conexao, $sqlCategoria);
           // $tarefas = array();
           if(mysqli_num_rows($resulCategoria) > 0){
            while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
             //   $tarefas[] = $tarefa;
               // echo $categoria['tipo_trabalho'];
              //  echo json_encode($categoria) . "<br>";

              echo "
              <a href='freelancerfree.php?id=$categoria[id_trabalho]'>
              <li class='list-group-item d-flex justify-content-between align-items-start'>
              <span class='badge my-2'>
                 <img src='img/$categoria[img_categoria]' alt=''>
              </span>
            <div class='ms-2 me-auto py-3'>
              <div class='fw-bold'>$categoria[tipo_trabalho]</div>
                   $categoria[descricao_trabalho]
            </div>

               </li>
               </a>
              ";
            }
          } else{
            echo "
              <h1 class='py-5'>Dados da pesquisa não encotrado</h1>
            ";
          }

          }
          else{
            $sqlCategoria = "SELECT * FROM tb_trabalho";
            $resulCategoria = mysqli_query($conexao, $sqlCategoria);
           // $tarefas = array();
            while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
             //   $tarefas[] = $tarefa;
               // echo $categoria['tipo_trabalho'];
              //  echo json_encode($categoria) . "<br>";
              echo "
              <a href='freelancerfree.php?id=$categoria[id_trabalho]'>
              <li class='list-group-item d-flex justify-content-between align-items-start'>

              <span class='badge my-2'>
                 <img src='img/$categoria[img_categoria]' alt=''>
              </span>
            <div class='ms-2 me-auto py-3'>
              <div class='fw-bold'>$categoria[tipo_trabalho]</div>
                   $categoria[descricao_trabalho]
            </div>

               </li>
               </a>
              ";
            }
          }

      ?>

          <li class="list-group-item d-flex justify-content-between align-items-start d-none">
              <span class="badge bg-primary d-none">
                  <i class="bi bi-laptop"></i>
              </span>
            <div class="ms-2 me-auto">
              <div class="fw-bold">Programador</div>
                  Lorem ipsum dolor,
            </div>

          </li>

        </ol>
    </section>

    <section id="prestadores" class="d-none">
      <div class="categoria text-center">
         <h4 >Freelancers</h4>
      </div>
      <div class="row bg-light">
        <div class="col-6 col-md-4 my-2">
          <div class="card">
            <div class="card-body text-center">
              <img src="img/Ana.JPG" alt="">
              <h5 class="card-title text-center">Programador</h5>
              <p class="text-start"><strong>Nome:</strong></p>
              <p class="text-start"><b>Numero:</b></p>
              <p class="text-star d-none"><b>Endereço:</b></p>
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
    </section>


  </main>

  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">

    <div class="row py-2">

      <div class="col" style="">
        <a href="index_free.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="#" class="btn-pesq ativado"><i class="bi bi-search ativado"></i></a>
      </div>

      <div class="col">
        <a href="chatfree.php" class=""><i class="bi bi-chat-text text-dark"></i></a>
      </div>
      <div class="col">
        <a href="perfilfree.php" class=""><i class="bi bi-person text-dark"></i></a>
      </div>
    </div>
  </footer>
</div>

 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">
             <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $dados0['img_prestador']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong class="text-dark" style=""><?php echo $dados0['nome_prestador']; ?></strong>
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

  </body>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <script>

  </script>
</html>
