<?php

   session_start();

   // VERIFICAAÇÃO
   if(!isset($_SESSION['logado'])){
    header('Location: index.php');
  }
  include 'conexao/conexao.php';
  include 'conexao/pegarusuario.php';
  include 'conexao/conversas.php';
  include 'conexao/tempo.php';

 // $chatCom = pegarUsuario($_SESSION['id_cliente'], $conexao);
  $id_user = PegarPrestador($_SESSION['freeID'], $conexao);
  $conversas = TrazConversas($id_user['id_prestador'], $conexao);
       // echo "<pre>";
      //  print_r($conversas);
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
     <link rel="stylesheet" href="css/chat2.css">
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
        background-color: #06406e !important;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      a{
        text-decoration: none;
        color: #fafafa;
      }
      header, footer{
      /*  background-color: #e6e6e6;
        color: #111;*/
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      header img{
       /* width: 50px;
        height: 50px;
        border-radius: 100%; */
      }
      #flex{
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .ajustes{
        display: flex;
        align-items: center;
      }
      label{
        font-size: 14px !important;
        font-weight: normal !important;
      }
      ul{
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 50px;
        border-radius: 15px !important;
      }
      footer{

      }

      #sms{
        border-radius: 10px;
      }
      #mensagem{
        position: relative;
      }
      #mensagem svg{
        position: absolute;
        right: 5%;
        top: 20%;

        background-color: #fafafa;


      }
      #corpo{
        margin-top: 0rem;
      }
      #corpo img{
        width: 50px;
        height: 50px;
        border-radius: 100%;
       /* border: solid 3px rgba(0,128,192,.9); */
      }
      #tamanho2{
       /* background-color: rgba(17, 17, 17, 0.185) !important; */
        background-color: #d6d6d6 !important;


      }
      #tamanho1{
       /* background-color: rgba(11, 105, 255, 0.609);*/
        background-color: #3a9ced;
      }
      #destaques{
        width: 100%;
        height: 150px;

        margin-top: 3em;
      }

      .pic1{
        min-width: 25%;
        height: 135px;
        border: solid 1px;
        border-radius: 15px !important;
        text-align: center;
        position: relative;
        margin-right: 9px;

      }
      .pic1::before{
        width: 100%;
        height: 135px;

        border-radius: 15px !important;
        content: "";
        left: 0;
        position: absolute;
        top: 0;
        background-color: rgba(1,1,1,.2);
      }
      #pic1 svg{
        margin-top: 25%;
      }
      .pic1 img{
        width: 35px;
        height: 35px;
        border-radius: 100%;
        display: block;
        margin-right: auto;
        margin-left: auto;
        margin-top: 60%;
        border: 3px solid rgba(0,128,192,.9);
      }
      #pic2{
        background: url(img/pca15.jpg) no-repeat;
        background-size: cover;
        background-position: center;
      }
      #pic4{
        background: url(img/IMG_2343.GIF) no-repeat;
        background-size: cover;
        background-position: center;
      }
      #pic3{
        background: url(img/AfroDuro-Paulo.jpg) no-repeat;
        background-size: cover;
        background-position: center;
      }
      .nav-scroller {
  position: relative;
  z-index: 2;
 /* height: 2.75rem; */
  overflow-y: hidden !important;
  min-height: 150px !important;


}
.nav-scroller .nav {
  display: flex;
  overflow-x: auto;
   flex-wrap: nowrap;
  -webkit-overflow-scrolling: touch;
    overflow-y: hidden !important;


}
main{
  margin-top: 2em !important;
}
.dropdown-menu{
  z-index: 9999;
}
.offcanvas-body{
  text-align: left !important;
  
}
.offcanvas-body li{
  text-align: left !important;
 
  min-width: 100%; 
}
.offcanvas-body ul{
  margin-top: 3em !important;

}
    </style>



  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="todo">
  <header class="fixed-top">
    <div class="row bg-white">
      <div class="col-3 py-2 d-flex ">

      <div class="dropdown px-2" id="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $id_user['img_prestador']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1" style="min-height: 150px !important;">
        <li><a class="dropdown-item" style="font-weight: bold;" href="#">
        <?php echo $id_user['nome_prestador']; ?>
        </a></li>
        <li class="bg-light"><a class="dropdown-item" href="#">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="index.php">Sair da conta</a></li>
      </ul>
    </div>

        <a href="chat.php" id="voltar" class="text-dark d-none" style="font-size: 25px; font-weight: bolder;">
          <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      <div class="col-6">
      <img src="img/logo.png" class="" alt="" style="max-width: 100%;">
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
  <form action="conexao/busca.php" method="post" class="d-none">
        <div class="search d-flex text-dark" id="cp" style="top: 2em; z-index: 9999; opacity: 1;">

          <button type="submit" name="pesqChatFree" id="pesqChatFree" class="btn btn-sm btn-default">
            <i class="bi bi-search"></i>
          </button>
          <input type="search" name="buscarChatFree" id="buscarChatFree" class="text-dark w-100" id="pc_pesq" placeholder="Pesquisar Serviços" style="color: black !important;  z-index: 9999;">
          <div class="result-pesq">
              <!--PESQUISAR-->
          </div>
        </div>
      </form>
  <main class="p-0" id="corpo" style="">
    <div class="info py-3 text-start">
      <h3>
        Mensangens
      </h3>
    </div>
    <div id="listasms" class="">
        <div class="container w-50 d-none" style="background-color: rgba(128,128,128,.2); display: flex; justify-content: space-around; align-items: center; padding: 0; border-radius: 5px;">
        <a href="#" class="btn btn-secondary" style="width: 50%">Chat</a>
        <a href="#" style="width: 50%">Grupo</a>
        </div>
        <?php 
          if(!empty($conversas)){

            foreach($conversas as $conversar){

              $id_1 = $_SESSION['freeID'];
              $id_2 = $conversar['id_cliente'];
              $open = 0;

           /*  $contar = $conexao->exec("SELECT COUNT(messagem) messagem FROM  chats WHERE receber_id = $id_1 AND enviar_id = $id_2 GROUP BY receber_id ORDER BY chat_id DESC");
             print_r($contar) */
           /*   $contar	=	$conexao->query("SELECT COUNT(messagem) messagem FROM  chats WHERE receber_id = $id_1 AND enviar_id = $id_2 GROUP BY receber_id ORDER BY chat_id DESC");
              print_r($contar); */
  
        /*     $sql	=	$conexao->query("SELECT COUNT(messagem) FROM  chats WHERE receber_id = $id_2 AND enviar_id = $id_1 GROUP BY enviar_id");
              $contar	=	$sql->fetchAll();
              print_r($contar); */
  
          /*   $sql	=	$conexao->query("SELECT COUNT(messagem) FROM  chats WHERE receber_id = $id_2 AND enviar_id = $id_1 GROUP BY receber_id");
             $contar =	$sql->fetchAll(PDO:FETCH_ASSOC);
             print_r($contar); */

             $calculo	=	$conexao->prepare('SELECT COUNT(messagem) FROM  chats WHERE receber_id = :id_1 AND enviar_id = :id_2 GROUP BY receber_id ORDER BY chat_id DESC'
            );
              $calculo->execute([':id_1'	=>	$id_1, ':id_2'	=>	$id_2]);
                    $contar	=	 $calculo->fetch(PDO::FETCH_ASSOC);
                  //  print_r($contar);


             $query	=	$conexao->prepare('SELECT messagem FROM  chats WHERE receber_id = :id_1 AND enviar_id = :id_2 GROUP BY receber_id ORDER BY chat_id DESC'
  );
          $query->execute([':id_1'	=>	$id_1, ':id_2'	=>	$id_2]);
          $dados	=	$query->fetch(PDO::FETCH_ASSOC);
        //  print_r($dados);
        ?>
        <a href="messagefree.php?idCliente=<?=$conversar['id_cliente']; ?>" class="conatiner-fluid d-flex justify-content-around nav-link link-dark" style="margin-top: 5%; position: relative;">
        <img src="img/<?=$conversar['img_cliente']; ?>" style="">
          <?php
            if (Ver_Tempo($conversar['ver_tempo']) == "Ativa") {
            
           ?>
                 <div class="online"></div>
        <?php
            }
     
           
              
          ?>
         
        
        <p class="text-left" style="text-align: left !important;">
            <strong>
              <?= $conversar['nome_cliente']; ?>
            </strong><br>
            <?= $dados['messagem']; ?>
        </p>
        <span class="text-right" style="">
            22:48<br>
            <label class="text-white" style="background-color: rgba(0,128,192,.9); border-radius: 100%; width: 20px !important; height: 20px !important;"><?php /*print_r($contar); */ ?></label>
        </span>
        </a>
           <hr>   
        <?php 
         //   }
          }
        }

          else{
        ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <i class="bi bi-chat-dots-fill d-block" style="font-size: 3rem;"></i>    
              Sem mensages no momento...
           </div>

        <?php } ?>
        
    </div>


  </main>

  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">
    <div id="chatRodape" class="container d-none">
      <form action="" class="d-flex justify-content-around py-2">
        <div class="d-flex flex-shrink">
          <a href="#"><i class="px-2 bi bi-emoji-smile text-white"></i></a>
          <a href="#" class="bi bi-card-image text-white"><i></i></a>
          <a href="#"><i class="px-1 bi bi-mic text-white"></i></a>
        </div>
        <div class="py-1 flex-grow-1">
          <input type="text" name="" id="escrevesms" class="w-100" placeholder="enviar mensangem...">
        </div>
        <div class="d-flex flex-shrink">
          <a href="#tamanho1" id="mandarsms"><i class="bi bi-cursor text-white"></i></a>
          <a href="#!"><i class="px-2 bi bi-file-earmark-plus  text-white"></i></a>
        </div>

      </form>
    </div>

    <div class="row py-2" id="menuRodape">

      <div class="col" style="">
        <a href="index_free.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="pesquisarFree.php" class="btn-pesq"><i class="bi bi-search text-dark"></i></a>
      </div>

      <div class="col">
        <a href="#" class="ativado"><i class="bi bi-chat-text ativado"></i></a>
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
        <img src="img/<?php echo $id_user['img_prestador']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong class="text-dark" style=""><?php echo $id_user['nome_prestador']; ?></strong>
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
  <script src="js/index.js"></script>
    <script src="js/chat.js"></script>

  <script>
    
  </script>
</html>
