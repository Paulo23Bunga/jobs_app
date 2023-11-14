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
    
  if(isset($_GET['id'])){
    $id_perfil = $_GET['id'];

    $sqlBusca = "SELECT * FROM tb_prestador WHERE id_prestador LIKE  '$id_perfil'";
    $resultado = mysqli_query($conexao, $sqlBusca);
    $perfil = mysqli_fetch_array($resultado);
   
   // $tarefas = array();
/*    while ($tarefa = mysqli_fetch_assoc($resultado)) {
     //   $tarefas[] = $tarefa; 
      //  echo $tarefa['nome'];
        echo json_encode($tarefa) . "<br>";
    } */
  }
  else{
     echo"
     <script>
        alert('noa temos niguem que preste este serviço ainda');
     </script>
     ";
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
        max-height: 80vh;
        overflow-y: auto;
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
    #perfilpic{
      position: absolute;
      width: 200px;
      min-height: 200px;
      border-radius: 100% !important;
    /*  margin-left: 25%;
      margin-right: 25%; */
      left: 25%;
      right: 25%;
      top: 5vh;
   
    }
    #galeria{
      padding-bottom: 5em;
    }
     #galeria .col-6{
      border-bottom: 1px solid gray;

    }
      #galeria .Ativado{
      border-bottom: 2px solid black;
    }
    #galeria img{
      width: 100%;
      height: 150px;
    }
    main b{
      color: #3289c8  !important;
    }
    </style>



  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="todo">
  <header class="fixed-top" style="">
    <div class="card text-center" style="position: relative; height: 150px; background-color:  #3289C8;">

     
      <img src="img/<?php echo $perfil['img_prestador']; ?>" alt="" id="perfilpic" class="rounded-circle me-2">
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
    <div style="margin-top: 10em;" class="">
       <p class="lead text-dark">
          <b>Nome:</b> <?php echo " ". $perfil['nome_prestador']; ?>
        </p>
          <p class="lead">
          <b>Descrição:</b> <?php echo " ".$perfil['descricao_prestador']; ?>
        </p>
    </div> 
    <hr>
    <div class="">
      <p class="lead">
  <strong>Informação Profissional</strong>
</p>
<p class="lead">
  <b>Area de Trabalho:</b><?php echo " ".$perfil['categoria_prestador']; ?>
</p>
<p class="lead">
  <b>Tempo de Atuação:</b><?php echo " ".substr($perfil['ver_tempo'], 0, 11); ?>

</p>
<p class="lead">
  <b>Formação Academica:</b> <?php echo " ".$perfil['formacao_prestador']; ?>
</p>
    </div>
  <div class="container text-center">
    <p>
      <a href="#?solita=<?= $perfil['id_trabalho']; ?>" class='btn btn-outline-secondary' id='solicita'>Solicitação de serviço</a>
    </p>
    
  <p class="lead">
  <b>Avaliação:</b> <?php
     if(empty($perfil['destaques']) AND  ($perfil['destaques']<=0)){
      echo " 
          Sem Avaliação
      ";
    }
          if(($perfil['destaques']>=1) AND  ($perfil['destaques']<=10)){
            echo " 
            <i class='bi bi-star-half'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=11) AND  ($perfil['destaques']<=20)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=21) AND  ($perfil['destaques']<=30)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=31) AND  ($perfil['destaques']<=40)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=41) AND  ($perfil['destaques']<=50)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=51) AND  ($perfil['destaques']<=60)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=61) AND  ($perfil['destaques']<=70)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-half'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=71) AND  ($perfil['destaques']<=80)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star'></i>
            ";
          }
          if(($perfil['destaques']>=81) AND  ($perfil['destaques']<=90)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
            ";
          }
          if(($perfil['destaques']>=91)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            ";
          }
          
  
  
 // echo " ".$dados0['destaques']; 
  ?>
</p>
    <div class="row" id="galeria">
      <div class="col-6 Ativado">
        <i class="bi bi-grid-3x3-gap-fill"></i>
       
      </div>
      <div class="col-6" data-bs-toggle="" data-bs-target="">
        <?php echo"
        <a href='message.php?idPrestador=$perfil[id_prestador]' class='text-dark'>
              <i class='bi bi-chat' style='font-size: 21px;'></i>
        </a> 
        ";
?>
      </div>
      <?php 
           $sqlCategoria1 = "SELECT * FROM tb_trabalhos_feitos WHERE id_prestador_trabalho = $id_perfil";
        $resulCategoria1 = mysqli_query($conexao, $sqlCategoria1);
       // $tarefas = array();
        
          # code...
        
        while ($categoria1 = mysqli_fetch_assoc($resulCategoria1)) {
         //   $tarefas[] = $tarefa;
           // echo $categoria['tipo_trabalho'];
          if (!empty($categoria1['pic_trabalho'])) {
      ?>
      <div class="col-4 py-1">
        <img src="img/<?= $categoria1['pic_trabalho'] ?>">
      </div>
    <?php }else{

      echo "<h1>Não tem nenhum registros dos teus trabalhos ainda...<h1>";
    }
    } 

     ?>
      <div class="col-4 py-1 d-none">
        <img src="img/paste.png d-none">
      </div>
      <div class="col-4 py-1 d-none">
        <img src="img/60.jpg d-none">
      </div>
      <div class="col-4 py-1 d-none">
        <img src="img/c1.jpg d-none">
      </div>
      <div class="col-4 py-1 d-none">
        <img src="img/dj.png d-none">
      </div>
      <div class="col-4 py-1 d-none">
        <img src="img/Programador2.jpg">
      </div>

    </div>
     
  </div>

  </main>


  <footer class="conatiner mt-auto text-white-50 fixed-bottom" id="footer">

    <div class="row py-2">

      <div class="col" style="">
        <a href="index_cliente.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="pesquisar.php" class="btn-pesq ativado"><i class="bi bi-search text-dark ativado"></i></a>
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


<div class="modal fade" id="adtrabalhos" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Adiciona meus servico</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3 text-start">
            <label class="form-label" for="customFile">Imagen</label>
            <input type="file" class="form-control" id="customFile">
          </div>
          <div class="mb-3 text-start">
            <label class="form-label" for="customFile">Descriçao</label>
            <textarea name="" id="" placeholder="Fale um pouco sobre este trabalho" class="form-control" cols="30" rows="10"></textarea>
          </div>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


  </body>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <script>
    /*
    $("#solicita").click(()=>{
    //alert("Ola")
    let dados = document.getElementById("solicita");
    alert(dados.href);
})
*/
   /**Clicado**/
   $("#solicita").on("click", function(event){
        event.preventDefault();
        let usuario = <?= $dados0['id_cliente'] ?>;
       let dadosSolicita = <?= $perfil['id_prestador'] ?>;
       let contador = <?= $perfil['solicitacao'] ?>;
       total = contador + 1;

       $.post("conexao/cadastrar.php",
        {
            solicita: dadosSolicita,
            total: total,
            usuario: usuario
        }, 
        function(data, status){
            console.log(status);
        }
       );  
    
   })
  </script>


</html>
