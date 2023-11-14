<?php
$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");

     //DADOS
     $id0 = 3;
     $sql0 = "SELECT * FROM tb_cliente WHERE id_cliente = '$id0'";
     $resultado0 = mysqli_query($conexao, $sql0);
     $dados0 = mysqli_fetch_array($resultado0);

   //  print_r($dados0);

     //DADOS
     $id1 = 1;
     $sql1 = "SELECT * FROM tb_prestador WHERE id_prestador = '$id1'";
     $resultado1 = mysqli_query($conexao, $sql1);
     $dados1 = mysqli_fetch_array($resultado1);

   //  print_r($dados1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    
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
<body>
    <article class="ler" id="smschat">
     
    </article>
    
    <form action="enviar.php" method="post">

        <input type="hidden" name="emissor"  id="emissor"  value="1">
        <input type="hidden" name="receptor" id="receptor"  value="1">
        <textarea name="sms" id="sms" cols="30" rows="10"></textarea>
        <button type="submit" name="enviar" id="enviar">Enviar</button>
    
    </form>

</body>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script>


    // Atualiza o chat a cada 1 segundo

 setInterval(function() {
  
        $.get('conexao/verificaSMS.php', {
            id_1: <?=$dados0['id_cliente']?>,
            id_2: <?=$dados1['id_prestador']?>
        }, 
        function(data) {
          console.log(data)
         $("#smschat").html(data);
        //  $("#ler").append(data);
        }); 

      }, 1000); 
</script>


</html>