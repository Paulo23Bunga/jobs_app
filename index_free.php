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
    $id0 = $_SESSION['freeID'];
    $sql0 = "SELECT * FROM tb_prestador WHERE id_prestador LIKE '$id0'";
    $resultado0 = mysqli_query($conexao, $sql0);
    $dados0 = mysqli_fetch_array($resultado0);
      $meuId = $dados0['id_prestador'];
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
    <link rel="stylesheet" href="css/jcarousel.responsive.css">

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
      /*  border: solid 2px red; */
        max-height: 85vh !important;
        overflow-y: auto !important;
        overflow-x: hidden;   
      }
     
    /*  #formroda{
      max-height: 90vh;
      overflow-x: auto !important;
    } */
    </style>


    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <link href="css/freelance.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column bg-light" id="todo">
  <header class="fixed-top bg-light">
    <div class="row bg-white">
      <div class="col-3 py-2">
      <div class="dropdown px-2">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $dados0['img_prestador']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
        <li style="font-weight: bold;"><a class="dropdown-item" href="#" style="font-weight: bold;">
          <?php echo $dados0['nome_prestador']; ?>
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
      <div class="col-6 py-2">
        <img src="img/logo.png" alt="" style="max-width: 100%;">
        <h2 class="titulo d-none">JOBS</h2>
      </div>
      <div class="col-3 py-2">
          <div class="dropdown">

            <a href="#" data-bs-toggle="modal" data-bs-target="#modalSolicita" class="d-flex align-items-center text-white text-decoration-none position-relative" id="solicitaUser1">
              <i class="bi bi-bell" style="font-size: 26px; color: #111;"></i>
                <?php 
                $sqlConta = "SELECT COUNT(*) as count FROM tb_solicitacao WHERE id_prestador = $meuId AND solicitado = 1 ORDER BY id_solicita ASC";
                $resultConta = mysqli_query($conexao, $sqlConta);    
                if (mysqli_num_rows($resultConta) > 0) {
                    // Output data of first row
                    $rowContar = mysqli_fetch_assoc($resultConta);
                    if ($rowContar["count"] == 0) {
                      echo "
                         <span class='position-absolute top-10 translate-middle badge border border-light rounded-circle bg-danger d-none' style='right: 20%;'><span class=''></span></span>
                      ";  
                    }else{
                      echo  "
                            <span class='position-absolute top-10 translate-middle badge border border-light rounded-circle bg-danger' style='right: 20%;'><span class=''>$rowContar[count]</span></span>
                      ";
                    }
                    
                } else {
                    echo "<span class='position-absolute top-10 translate-middle badge border border-light rounded-circle bg-danger d-none' style='right: 20%;'><span class=''></span></span>";
                }

               ?>
             
            </a>
          </div>
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
  <main class="px-1 py-0 text-center bg-light">
    <div class="card" id="banner">
              <div class="row">
                <div class="col-4" style="">
                  <img class="bd-placeholder-img d-none" width="100%" height="auto" src="img/procura.png" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false">

                </div>
                <div class="col-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
    </div>

  <div class="container-fluid bg-light" id="custom-cards">
    <div class="jcarousel-wrapper bg-light" style="border: none !important;">
      <h3 class="">Comunidade de Trabalhadores</h3>
    <div class="jcarousel" data-jcarousel="true" style="border: none;">
                <div class="d-flex destaca py-1" id="r">
                               <?php 
                       $sqlBusca = "SELECT * FROM tb_prestador WHERE id_prestador  != $id0 AND destaques >= 0 LIMIT 4";
          $resultado = mysqli_query($conexao, $sqlBusca);

       
          while ($tarefa = mysqli_fetch_assoc($resultado)) {

                   ?>

            <div class="col px-2">
            
        <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg picsfree" style="background-image: url(img/<?= $tarefa['img_prestador']; ?>);">
          <div class="d-flex flex-column p-5 pb-3 text-white text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h3>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                <small>Earth</small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                <small>3d</small>
              </li>
            </ul>
          </div>
        </div>
        </div>
                 <?php 
        }
    
      ?>    
    </div>
             <div class="d-flex destacar" id="">
                               <?php 
                  
           $sqlBusca1 = "SELECT * FROM tb_prestador WHERE id_prestador  != $id0 AND solicitacao > 0 ORDER BY id_prestador DESC LIMIT 6";
          $resultado1 = mysqli_query($conexao, $sqlBusca1);
         // $tarefas = array();
          while ($tarefa1 = mysqli_fetch_assoc($resultado1)) {

                   ?>

            <div class="col px-2 px-1">
            
        <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg picsfree" style="background-image: url(img/<?= $tarefa1['img_prestador']; ?>);">
          <div class="d-flex flex-column p-5 pb-3 text-white text-shadow-1">
            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h3>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                <small>Earth</small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                <small>3d</small>
              </li>
            </ul>
          </div>
        </div>
        </div>
                 <?php 
        }
    
      ?>    
    </div>
                </div>

                <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>

                <p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1" class="active">1</a><a href="#2">2</a><a href="#3">3</a><a href="#4">4</a><a href="#5">5</a><a href="#6">6</a></p>
            </div>

   
  </div>

  <div class="row py-5 text-center" style="margin: auto !important;">
    <h3 class="">Como funciona?</h3>
      <div class="col-4 text-center">
       
        <div class="bg-secondary rounded py-4" width="100" height="100" style="width: 100px; height:100px;">
        <i class="bi bi-lightbulb text-white" style="font-size: 31px;"></i>
        </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-4">
      <div class="bg-secondary rounded py-4" width="100" height="100" style="width: 100px; height:100px;">
        <i class="bi bi-gift text-white" style="font-size: 31px;"></i>
        </div>

        
      </div><!-- /.col-lg-4 -->
      <div class="col-4">
      <div class="bg-secondary rounded py-4" width="100" height="100" style="width: 100px; height:100px;">
        <i class="bi bi-megaphone text-white" style="font-size: 31px;"></i>
        </div>
      </div><!-- /.col-lg-4 -->
    </div>

 
  </main>

  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">

    <div class="row py-2">

      <div class="col" style="">
        <a href="#!" class="ativado"><i class="bi bi-house-door-fill ativado"></i></a>
      </div>
      <div class="col">
        <a href="pesquisarFree.php" class="btn-pesq"><i class="bi bi-search text-dark"></i></a>
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

      <?php 

$sqlCategoria = "SELECT * FROM tb_trabalho";
$resulCategoria = mysqli_query($conexao, $sqlCategoria);
// $tarefas = array();

?>
  <!--MODAL CADASTRO-->
<div class="modal fade" id="alterPerfil" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Alterar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="conexao/cadastrar.php" enctype="multipart/form-data" method="post" id="formroda">
        <input type="hidden" name="idservi" id="idservi" value="<?php echo $dados0['id_prestador']; ?>">
            <div class="row g-3" >
        <div class="col-6">
          <label for="firstName" class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu primeiro e ultimo nome..." value="<?php echo $dados0['nome_prestador']; ?>" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="lastName" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Digite Seu email" value="<?php echo $dados0['email_prestador']; ?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="username" class="form-label">Contacto</label>
          <input type="text" class="form-control" id="contacto" name="contacto" placeholder="digite o seu contato" value="<?php echo $dados0['contacto_prestador']; ?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
        <div class="col-6">
          <label for="lastName" class="form-label">Especialidade</label>
          <input type="text" class="form-control" name="especialidade" id="especialidade" placeholder="Digite sua especialidade" value="<?php echo $dados0['categoria_prestador']; ?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="username" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="local" name="local" placeholder="Digite seu endereço" value="<?php echo $dados0['endereco_prestador']; ?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="email" class="form-label">Data de Nacimento</label>
          <input type="date" class="form-control" id="dataFree" name="dataFree" placeholder="data" value="<?php echo $dados0['data_prestador']; ?>">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
       
        <div class="col-6">
          <label for="address" class="form-label">Senha</label>
          <input type="password" class="form-control" id="Senha" name="Senha" placeholder="senha" required value="<?php echo $dados0['senha_prestador']; ?>">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="col-6">
          <label for="address2" class="form-label">Formação Academica</label>
          <input type="text" class="form-control" id="formacao" name="formacao" placeholder="Que curso voce fez" value="<?php echo $dados0['formacao_prestador']; ?>">
        </div>
        <div class="col-6">
          <label for="country" class="form-label">Com o que trabalha?</label>
          <select class="form-select" id="Profissao" name="Profissao" required>
            <option value="">Sua Profição...</option>
            <?php   while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
             ?>
            <option value="<?php  echo $categoria['id_trabalho']; ?>"><?php  echo $categoria['tipo_trabalho']; ?></option>
            <?php 
              }
            ?>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-6">
          <label for="zip" class="form-label">Imagen</label>
          <input type="file" class="form-control" id="Imagem" name="Imagem" placeholder="Insira a sua Foto de perfil" Value="<?php echo $dados0['img_prestador']; ?>">
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
        <div class="col-12">
          <label for="zip" class="form-label">Descrição</label>
          
          <textarea name="descricao" id="descricao"  class="form-control" cols="30" rows="3" placeholder="Deixe sua descrição" Value="<?php echo $dados0['descricao_prestador']; ?>"></textarea>
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
        <div class="col-12">
          <label for="zip" class="form-label" style="opacity: 0;">Imagen</label>
          <button type="submit" class="btn btn-outline-info w-100" id="alterFree" name="alterFree">Cadastrar</button>
        </div>
      </div>
        </form>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL SOLICITAÇÔES-->
<div class="modal fade" id="modalSolicita" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Solicatões de Clientes <?php echo "<span class='position-relative badge border border-light rounded-circle bg-dark'><span class=''>$rowContar[count]</span></span>"; ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <div class="list-group list-group-flush border-bottom scrollarea">
     
          <?php
            $cliSolicita = "SELECT tb_solicitacao.solicitado, tb_cliente.id_cliente,  tb_cliente.nome_cliente, tb_cliente.numero_cliente, tb_cliente.endereco_cliente, tb_cliente.email_cliente, tb_cliente.img_cliente FROM tb_solicitacao JOIN tb_cliente ON tb_solicitacao.id_cliente = tb_cliente.id_cliente GROUP BY tb_cliente.id_cliente ORDER BY id_solicita";

            $resulSolicita = mysqli_query($conexao, $cliSolicita);
         // $tarefas = array();
          while ($solicitei = mysqli_fetch_assoc($resulSolicita)) {
             // print_r($solicitei);
            //var_dump($solicitei);



         

           ?>    

        <div class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center justify-content-around">
          <div class="badge my-2 col-4">
               <img src="img/<?= $solicitei['img_cliente']; ?>" alt="" style="max-width: 100%; max-height: 100px;" class='rounded img-thumbnail'>
          </div>
        <div class="col-8">
          <strong class="mb-1"><?= $solicitei['nome_cliente']; ?></strong>
          <small class="text-muted d-block"><?= $solicitei['numero_cliente']; ?></small>
          <div class="mb-1 small"><?= $solicitei['email_cliente']; ?></div>
          <p><?= $solicitei['endereco_cliente']; ?></p>
          <p>
            <button class="btn btn-dark aceitaSo" id="<?= $solicitei['id_cliente']; ?>" name="aceitaSo">Aceitar</button>
            <button class="btn btn-dark">Chat</button>
          </p>
        </div>      
      </div>
      
      <?php 
         }


      ?>
    </div>
      </div>
      <div class="modal-footer row">
      

      <div class="col" style="">
        <a href="index_free.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="pesquisarFree.php" class="btn-pesq"><i class="bi bi-search text-dark"></i></a>
      </div>

      <div class="col">
        <a href="chatfree.php" class=""><i class="bi bi-chat-text text-dark"></i></a>
      </div>
      <div class="col">
        <a href="perfilfree.php" class=""><i class="bi bi-person text-dark"></i></a>
      </div>
    
      </div>
    </div>
  </div>
</div>

  </body>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jcarousel.responsive.js"></script>
  <script src="js/jquery.jcarousel.min.js"></script>
  <script src="js/index.js"></script>
  <script>

        /**Clicado**/
 

Array.from($('.aceitaSo')).forEach((e)=>{
  e.addEventListener('click', (el)=>{
    var IdBaixar = e.id;
    let dadosSolicita = <?= $dados0['id_prestador'] ?>;
    
      
       // alert(dadosSolicita);
       $.post("conexao/cadastrar.php",
        {
            solicitaDados: dadosSolicita,
            usuarioDados: IdBaixar
        }, 
        function(data, status){
            console.log(status);
        }
       ); 

  })
})
  </script>
</html>
