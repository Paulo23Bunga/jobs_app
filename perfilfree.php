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
     $sql0 = "SELECT * FROM tb_prestador WHERE id_prestador LIKE '$id0'";
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
    #formroda{
      max-height: 50vh;
      overflow-x: auto !important;
    }
    </style>



  </head>
  <body class="d-flex h-100 text-center text-black bg-light">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" id="todo">
  <header class="fixed-top" style="">
    <div class="card text-center" style="position: relative; height: 150px; background-color:  #3289C8;">

      <img src="img/<?php echo $dados0['img_prestador']; ?>" id="perfilpic" class="d-none">
      <img src="img/<?php echo $dados0['img_prestador']; ?>" alt="" id="perfilpic" class="rounded-circle me-2">
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
          <b>Nome:</b> <?php echo " ". $dados0['nome_prestador']; ?>
        </p>
          <p class="lead">
          <b>Descrição:</b> <?php echo " ".$dados0['descricao_prestador']; ?>
        </p>
    </div> 
    <hr>
    <div class="">
      <p class="lead">
  <strong>Informação Profissional</strong>
</p>
<p class="lead">
  <b>Area de Trabalho:</b><?php echo " ".$dados0['categoria_prestador']; ?>
</p>
<p class="lead">
  <b>Tempo de Atuação:</b><?php echo " ".substr($dados0['ver_tempo'], 0, 11); ?>

</p>
<p class="lead">
  <b>Formação Academica:</b> <?php echo " ".$dados0['formacao_prestador']; ?>
</p>
    </div>
  <div class="container text-center">
  <p class="lead">
  <b>Avaliação:</b> <?php
     if(empty($dados0['destaques']) AND  ($dados0['destaques']<=0)){
      echo " 
          Sem Avaliação
      ";
    }
          if(($dados0['destaques']>=1) AND  ($dados0['destaques']<=10)){
            echo " 
            <i class='bi bi-star-half'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=11) AND  ($dados0['destaques']<=20)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=21) AND  ($dados0['destaques']<=30)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=31) AND  ($dados0['destaques']<=40)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=41) AND  ($dados0['destaques']<=50)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=51) AND  ($dados0['destaques']<=60)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=61) AND  ($dados0['destaques']<=70)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-half'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=71) AND  ($dados0['destaques']<=80)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=81) AND  ($dados0['destaques']<=90)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
            ";
          }
          if(($dados0['destaques']>=91)){
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
      <div class="col-6" data-bs-toggle="modal" data-bs-target="#adtrabalhos">
        <i class="bi bi-card-image"></i>

      </div>
      <?php 
           $sqlCategoria1 = "SELECT * FROM tb_trabalhos_feitos WHERE id_prestador_trabalho = $id0";
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
        <a href="index_free.php" class=""><i class="bi bi-house-door-fill text-dark"></i></a>
      </div>
      <div class="col">
        <a href="pesquisarFree.php" class="btn-pesq"><i class="bi bi-search text-dark"></i></a>
      </div>

      <div class="col">
        <a href="chatfree.php" class=""><i class="bi bi-chat-text text-dark"></i></a>
      </div>
      <div class="col">
        <a href="#" class="ativado"><i class="bi bi-person ativado"></i></a>
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
      <form action="conexao/cadastrar.php" enctype="multipart/form-data" method="post" id="">
          <div class="modal-body">
            <input type="hidden" name="idservi" id="idservi" value="<?php echo $dados0['id_prestador']; ?>">
          <div class="mb-3 text-start">
            <label class="form-label" for="customFile">Imagen</label>
            <input type="file" name="picservi" id="picservi" class="form-control" id="customFile">
          </div>
          <div class="mb-3 text-start">
            <label class="form-label" for="customFile">Descriçao</label>
            <textarea name="descservi" id="descservi" placeholder="Fale um pouco sobre este trabalho" class="form-control" cols="30" rows="10"></textarea>
          </div>
      </div>
      <div class="modal-footer">       
        <button type="submit" id="addServi" name="addServi" class="btn btn-primary w-100">Add Serviço</button>
      </div>
      </form>
    
    </div>
  </div>
</div>

<?php 

$sqlCategoria = "SELECT * FROM tb_trabalho";
$resulCategoria = mysqli_query($conexao, $sqlCategoria);
// $tarefas = array();

?>
<!--ALTERAR PERFIL-->
<div class="modal fade" id="alterPerfil" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Adiciona meus servico</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="conexao/cadastrar.php" enctype="multipart/form-data" method="post" id="formroda">
          <div class="modal-body">
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
          <input type="text" class="form-control" id="contacto" name="contacto" placeholder="digite o seu contato" value="" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
        <div class="col-6">
          <label for="lastName" class="form-label">Especialidade</label>
          <input type="text" class="form-control" name="especialidade" id="especialidade" placeholder="Digite sua especialidade" value="" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="username" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="local" name="local" placeholder="Digite seu endereço" value="" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="email" class="form-label">Data de Nacimento</label>
          <input type="date" class="form-control" id="dataFree" name="dataFree" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="col-6">
          <label for="address" class="form-label">Senha</label>
          <input type="text" class="form-control" id="Senha" name="Senha" placeholder="senha" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="col-6">
          <label for="address2" class="form-label">Confirmar Senha</label>
          <input type="text" class="form-control" id="Senhaconfirmacao" name="Senhaconfirmacao" placeholder="Confirme a sua senha">
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
          <input type="file" class="form-control" id="Imagem" name="Imagem" placeholder="Insira a sua Foto de perfil">
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
        <div class="col-12">
          <label for="zip" class="form-label" style="opacity: 0;">Imagen</label>
          <button type="submit" class="btn btn-outline-info w-100" id="cadeFree" name="cadeFree">Cadastrar</button>
        </div>
      </div>
      </div>
      <div class="modal-footer">       
        <button type="submit" id="addServi" name="addServi" class="btn btn-primary w-100">Add Serviço</button>
      </div>
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
