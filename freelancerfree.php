<?php
  $conexao = mysqli_connect('localhost','root','','jobs_bd');
  mysqli_set_charset($conexao, "utf8");

   session_start();
     // VERIFICAAÇÃO
     if(!isset($_SESSION['logado'])){
      header('Location: index.php');
    }
    
             //DADOS
    $id0 = $_SESSION['freeID'];
    $sql0 = "SELECT * FROM tb_prestador WHERE id_prestador = '$id0'";
    $resultado0 = mysqli_query($conexao, $sql0);
    $dados0 = mysqli_fetch_array($resultado0);
    

  if(isset($_GET['id'])){
    $id_categoria = $_GET['id'];

    $sqlBusca = "SELECT * FROM tb_prestador WHERE id_prestador LIKE  '$id_categoria'";
    $resultado = mysqli_query($conexao, $sqlBusca);
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
      #tipoServico p{
        font-size: 12 !important;
        max-width: 100%;
        

      }
      
    </style>


    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="todo">
  <header class="fixed-top">
    <div class="row bg-white">
      <div class="col py-2">

        <a href="#" id="voltar" class="text-dark" style="font-size: 25px; font-weight: bolder;">
          <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      <div class="col">
        <img src="img/logo.png" alt="" style="max-width: 100%;">
        <h2 class="titulo d-none">JOBS</h2></div>
      <div class="col py-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" class="bi bi-bell" viewBox="0 0 16 16">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
        </svg>
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
      

  <div id="tipoServico" class="bg-light ">
    <h1 class="text-secondary" style="">
    <?php
        $sqlCategoria = "SELECT * FROM tb_trabalho WHERE id_trabalho LIKE  '$id_categoria'";
        $resulCategoria = mysqli_query($conexao, $sqlCategoria);
       // $tarefas = array();
        while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
         //   $tarefas[] = $tarefa; 
            echo $categoria['tipo_trabalho'];
          //  echo json_encode($tarefa) . "<br>";
        }
    ?>

    </h1>

    <div class="row bg-light">
        <?php 

          if(mysqli_num_rows($resultado) > 0){
             while ($tarefa = mysqli_fetch_assoc($resultado)) {
              //   $tarefas[] = $tarefa; 
               //  echo $tarefa['nome'];
               //  echo json_encode($tarefa) . "<br>";
               echo "
                  
      <div class='col-6 col-md-4 my-2'>
      <div class='card'>
        <div class='card-body text-center'>
          <img src='img/$tarefa[img_prestador]' alt=''>
          <h5 class='card-title text-center'>$tarefa[categoria_prestador]</h5>
          <p class='text-start'><strong>Nome:</strong> $tarefa[nome_prestador];</p>
          <p class='text-start'><b>Epecialidade:</b>$tarefa[categoria_prestador]</p>
          <p class='text-start'><b>Endereço:</b>$tarefa[endereco_prestador]</p>
          
          <a href='freedadosfree.php?id=$tarefa[id_prestador]' class='text-secondary text-center'>Visitar Perfil</a>
          
          <div class='icones d-flex justify-content-around align-items-center'>
              <a href='messagefree.php?idPrestador=$tarefa[id_prestador]' class=''>
              <i class='bi bi-chat'></i>
              </a> 
            <div class='text-end'>
            <a href='#?like=$tarefa[id_prestador]' class=''>
              <i class='bi bi-hand-thumbs-up'></i>
            </a> 
              
              <i class='bi bi-hand-thumbs-down'></i>
            </div>
            
          </div>
        </div>
      </div>
    </div>

               ";
             }
            }
            else{
              echo "
              <h1 class='py-5'>Dados da pesquisa não encotrado</h1>
            ";
            }
        ?>
      
      <div class="col-6 col-md-4 my-2 d-none">
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
        <a href="index_free.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="pesquisarfree.php" class="btn-pesq ativado"><i class="bi bi-search text-dark ativado"></i></a>
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



  </body>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/index.js"></script>
  <script>

    	/**OBJETO HISTORY**/
	function hB(){
		window.history.back();
	}

 
 function comeco(){
	btnB=document.getElementById("voltar");

	
	btnB.addEventListener("click", hB);

	
 }
	window.addEventListener("load",comeco);
	

  </script>
</html>
