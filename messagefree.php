<?php

   session_start();
  
   // VERIFICAAÇÃO
   if(!isset($_SESSION['logado'])){
    header('Location: index.php');
  }
  
      include 'conexao/conexao.php';
      include 'conexao/pegarusuario.php';
     // include 'conexao/conversas.php';
      include 'conexao/tempo.php';

      if(!isset($_GET['idCliente'])){
        //  echo  "<script>alert('Pegui')</script>";
        header('Location: chatfree.php');
        exit;
      }

      $chatCom = pegarUsuario($_GET['idCliente'], $conexao);

      //$id_user = pegarUsuario($_SESSION['id_cliente'], $conexao);
      $id_user = PegarPrestador($_SESSION['freeID'], $conexao);

      $chatsDados = PegarChat($_SESSION['freeID'], $chatCom['id_cliente'], $conexao);
       
   //   print_r($chatsDados);
      
    if(empty($chatCom)){
      //  echo  "<script>alert('Pegui')</script>";
      header('Location: chatfree.php');
      exit;
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
  margin-top: 5em !important;
  
  
}
header .row{
 
  max-height: 90px;
  
}
header .row img{
 
 /* max-height: auto !important; */
  
}
.dropdown-menu{
  z-index: 9999;
}
#smschat{
  max-height: 80vh;
  overflow-y: auto !important;
  padding-top: 1rem !important;
  padding-bottom: 2em;
}
#escrevesms{
  max-height: 30px !important; 
  overflow-y: hidden !important;
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
      <div class="col-3 py-2 d-flex flex-column-reverse align-items-center justify-content-center">

      <div class="dropdown px-2" id="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/<?php echo $id_user['img_prestador']; ?>" alt="" width="32" height="32" class="rounded-circle me-2 mx-5">
        <strong class="text-dark">Online</strong>
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

        <a href="#" id="voltar" class="text-dark" style="font-size: 25px; font-weight: bolder;">
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
 
  <main class="p-0" id="corpo" style="">

    <div id="smschat" class="container">
        

         <?php 
          if (!empty($chatsDados)) { 
            foreach ($chatsDados as $dadosChat) {
                  if ($dadosChat['receber_id'] == $_SESSION['freeID']) {
              ?>
               <!--MENSSAGEM Q ENTRA -->
                 <div class="d-flex justify-content-start mb-4 outgoing_msg py-2"­ id="outgoing_msg">
          <div class="img_cont_msg">
            <img src="img/<?php echo $chatCom['img_cliente']; ?>" class="rounded-circle user_img_msg">
          </div>
           <div class='msg_cotainer sent_msg' id='tamanho2'>
              <span class="msg_nome"><strong class="text-secondary"><?php echo $chatCom['nome_cliente']; ?></strong></span>
              <p id="texto" class="text-dark text-start" > 
                 <?=$dadosChat['messagem']?> 
              </p>
               <span class="msg_time text-secondary"><?php echo $dadosChat['criar_tempo']; ?></span>
          </div>
        </div>

          <?php
                  } else{ ?>
                        <!-- MENSSAGEM Q SAI -->
         <div class='d-flex justify-content-end mb-4 incoming_msg' id="incoming_msg">
          <div class='msg_cotainer_send received_withd_msg' id='tamanho1'>
                <p id="texto" class="text-light text-start"><?=$dadosChat['messagem']?></p>
                <span class="msg_time_send text-secondary" style=""><?php echo $dadosChat['criar_tempo']; ?></span>
           </div>
           <div class="img_cont_msg">
             <img src="img/<?php echo $id_user['img_prestador']; ?>" class="rounded-circle user_img_msg">
            </div>
        </div>
   

            <?php      }
              }  
         ?>

       



       
      
         <?php 
           }else{
            echo"
               <div class='alert alert-info alert-dismissible fade show d-none' role='alert'>
              <i class='bi bi-chat-dots-fill d-block' style='font-size: 3rem;'></i>    
              Sem mensages no momento...
           </div>

            ";
           }
         ?>
         
    </div>
  </main>

  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">
    <div id="chatRodape" class="container">
      <form action="conexao/inserirChat.php" method="post" entype="multipart/form-data" class="d-flex justify-content-around py-2">
          <input type="hidden" name="idcliente" id="idcliente" value="<?php echo "$chatCom[id_cliente]"; ?>">
        <div class="d-flex flex-shrink py-2">
          <a href="#"><i class="px-2 bi bi-emoji-smile text-white"></i></a>
          <a href="#" class="bi bi-card-image text-white"><i></i></a>
          <a href="#"><i class="px-1 bi bi-mic text-white"></i></a>
        </div>
        <div class="py-1 flex-grow-1">
          
          <textarea name="escrevesms" id="escrevesms" class="w-100 py-1" placeholder="enviar mensangem..." cols="3"></textarea>
         
        </div>
        <div class="d-flex flex-shrink">
          <button type="submit" name="smsfree" id="smsfree" style="z-index: 2;" class="btn btn-sm btn-default">
          <i class="bi bi-cursor text-white" style="font-size: 21px;"></i>
        </button>
         
          <a href="#!" style="z-index: 1;" class="py-2"><i class="px-2 bi bi-file-earmark-plus  text-white"></i></a>
        </div>

      </form>
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
    	function hB(){
		window.history.back();
	}

 
 function comeco(){
	btnB=document.getElementById("voltar");

	
	btnB.addEventListener("click", hB);

	
 }
	window.addEventListener("load",comeco);

/*
	
  $("#mandarsms").click(function(event){
    event.preventDefault();

    let mandasms = document.getElementById("mandarsms");
    let messagem = $("#escrevesms").val();
    let receber_id = $("#idPrestador").val();
    // let messagem = document.getElementById("escrevesms").innerHTML;


    let mandarsms = mandasms.name; 
 // console.log(mandarsms);
   
    if(messagem == "") return;
 //   alert(mensagen);

     // console.log(receber_id);
 /*  
    $.post("conexao/inserirChat.php",
        {
         // mandarsms: mandarsms,
          messagem: messagem,
          receber_id: receber_id
          
        },
        function(data, status){
          $("#escrevesms").val("");
          $("#smschat").append(data);
      
            console.log(data);
         // roralBaixo();
        }
       );    */

     /*     $.ajax({
                    url: "conexao/inserirChat.php",
                    method: "post",
                    data:{messagem: messagem, receber_id: receber_id},
                    success: function(dados){
                       // $("#smscha").html(dados).text();
                         $("#escrevesms").val("");
                        $("#smschat").append(dados);
                           console.log(dados);
                      // roralBaixo();
                    }
                }); 

/*
      $.ajax({
        type: 'POST',
        data: {
          mandarsms: mandarsms, messagem: messagem, receber_id: receber_id
        },
        url: 'conexao/inserirChat.php',
        dataType: 'json',
        async: false,
        success: function(result) {
          $("#escrevesms").val("");
          $("#smschat").append(dados);
          console.log(result);
        },
        error: function(result) {
          console.log(result);
        }
      });
 
*//*

 })
*/
    
   
  
 
    // Atualiza o chat a cada 1 segundo
    let fechData = function(){
    $.post("conexao/chatexto.php", 
      {
        id_2:  <?=$chatCom['id_cliente']?>
      },
       function(data, status){
         
          $("#smschat").append(data);
            if (data != "") roralBaixo();
            
        }
    );
 }

    fechData();
   setInterval(fechData, 1000); 
/*
    setInterval(function() {
  
  $.get('conexao/verificaSMS.php', {
      id_1: 
  }, 
  function(data) {
   // console.log(data)
   $("#smschat").html(data);
  // $("#smschat").append(data);
  }); 

}, 1000);  */
  </script>

</html>
