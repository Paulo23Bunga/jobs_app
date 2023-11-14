<?php
session_start();
$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");
//$_SESSION['logado'] = false;

if (isset($_POST['entraLogin'])) {
    $erros = array();
    $username = $_POST['loginome'];
    $password = $_POST['senhalogin'];

    $traz_dados = "SELECT nome_cliente FROM tb_cliente WHERE nome_cliente LIKE '$username'";
    $resultado = mysqli_query($conexao, $traz_dados);
    // Verificar as credenciais do usuário em seu sistema de autenticação
    if (mysqli_num_rows($resultado) > 0) {
        // Se as credenciais forem válidas, inicie uma sessão e redirecione para a página de perfil
        $traz_dados1 = "SELECT * FROM tb_cliente WHERE nome_cliente LIKE '$username' AND senha_cliente  LIKE '$password'";
        $resultado1 = mysqli_query($conexao, $traz_dados1);
        if(mysqli_num_rows($resultado1) == 1){
            $dados = mysqli_fetch_array($resultado1);
            $_SESSION['logado'] = true;
            $_SESSION['id_cliente'] = $dados['id_cliente'];
            header('Location: index_cliente.php?sucesso');
        }else{
          //  
            $erros[] = "<li>Usuario e senha não conferem</li>";
            header('Location: index.php?Invalido');
        }
        //$dados = mysqli_fetch_array($resultado);

     
        exit();
    } else {
        // Se as credenciais forem inválidas, exiba uma mensagem de erro
      //  echo "Usuário ou senha inválidos.";
        
        $erros[] = "<li> Usuário inexistente </li>";
        header('Location: index.php?Sem Registro');
    }
}

  if (isset($_POST['loginEntra'])) {
    $erros = array();
    $username = $_POST['loginomeP'];
    $password = $_POST['senhaloginP'];

    $traz_dados = "SELECT nome_prestador FROM tb_prestador WHERE nome_prestador LIKE '$username'";
    $resultado = mysqli_query($conexao, $traz_dados);
    // Verificar as credenciais do usuário em seu sistema de autenticação
    if (mysqli_num_rows($resultado) > 0) {
        // Se as credenciais forem válidas, inicie uma sessão e redirecione para a página de perfil
        $traz_dados1 = "SELECT * FROM tb_prestador WHERE nome_prestador LIKE '$username' AND senha_prestador  LIKE '$password'";
        $resultado1 = mysqli_query($conexao, $traz_dados1);
        if(mysqli_num_rows($resultado1) == 1){
            $dados = mysqli_fetch_array($resultado1);
            $_SESSION['logado'] = true;
            $_SESSION['freeID'] = $dados['id_prestador'];
            header('Location: index_free.php?sucesso');
        }else{
          //  
            $erros[] = "<li>Usuario e senha não conferem</li>";
            header('Location: index.php?Invalido');
        }
        //$dados = mysqli_fetch_array($resultado);

     
        exit();
    } else {
        // Se as credenciais forem inválidas, exiba uma mensagem de erro
      //  echo "Usuário ou senha inválidos.";
        
        $erros[] = "<li> Usuário inexistente </li>";
        header('Location: index.php?Sem Registro');
    }
}

 //   mysqli_close($conexao);
  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-icons.css">

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
      html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  flex-direction: column;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
  position: relative;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  max-height: 80vh;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 15px;
  margin: auto 0;
  text-align: center;
}
.form-signin::-webkit-scrollbar {
  display: none;
}
.form-signin::-moz-scrollbar {
  display: none;
}
.form-signin::-ms-scrollbar {
  display: none;
}
.form-signin::-o-scrollbar {
  display: none;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
  header{
   /* border: solid 2px red; */
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 15vh;
    background-color: #3a9ced;
    border-bottom-left-radius: 100%;
    background:	linear-gradient(#27536d,#3a9ced) !important;
  }
  footer{
   /* border: solid 2px red; */
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 15vh;
    background-color: #3a9ced;
    border-top-right-radius: 100%;
    background:	linear-gradient(#3a9ced, rgb(44, 121, 156)) !important;
  }

  #tipoconta i{
    font-size: 70px;
  }
  header a{
    position: fixed;
    left: 5%;
    top: 9%;
    color: white;
    font-size: 25px;
    width: 40px;
    height: 40px;
    border-radius: 100%;
    background-color: #3a9ced;
    background:	linear-gradient(#3a9ced, rgb(44, 121, 156)) !important;
    text-align: center;
    font-weight: bold;

  }
  header i{

    color: white;


    text-align: center;
    font-weight: bold !important;

  }
  #btn-conta-cli, #btn-conta-free{
    cursor: pointer;
  }

  @media(min-width: 776px){
    form{
        max-width: 50% !important;
       margin: auto;
    }
  }

    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <header style="">
      <a href="#" id="voltar-login" class="voltar d-none">
        <i class="bi bi-chevron-double-left"></i>
      </a>
      <a href="#" id="voltar-loginP" class="voltar d-none">
        <i class="bi bi-chevron-double-left"></i>
      </a>
      <a href="#" id="voltar-escolhe" class="voltar d-none">
        <i class="bi bi-chevron-double-left"></i>
      </a>
      <a href="#" id="voltar-benvindo" class="voltar d-none">
        <i class="bi bi-chevron-double-left"></i>
      </a>
   
  </header>
<main class="form-signin px-0" style="min-width: 90%;">

   <!--TELA DE CADASTRO CLIENTE 3-->
   <form action="conexao/cadastrar.php" enctype="multipart/form-data" method="post" id="benvindo_cliente" class="d-none" >
    <img class="mb-4"  src="img/client101.png" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-bold">CRIAR CONTA</h1>
    <div class="row g-3 text-start" >
      <div class="col-6">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu primeiro e ultimo nome..." value="" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email..." value="" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="telefone" class="form-label">Contacto</label>
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite seu numero de telefone..." value="" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="dataNace" class="form-label">Data de Nacimento</label>
        <input type="date" class="form-control" id="dataNace" name="dataNace" placeholder="sua data de nascimento">
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua senha" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>

      <div class="col-6">
        <label for="senha2" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="senha2" name="senha2" placeholder="Sua Localidade">
      </div>
      <div class="col-6">
         <fieldset class="mb-3">
              <label for="firstName" class="form-label">Genero</label><br>
                          
            <input type="radio" class="has-validation" name="genero" id="novo1" placeholder="" value="1">
            <label for="novo1">Maculino</label>
            <input type="radio" class="has-validation" name="genero" id="novo0" placeholder="" value="0">
            <label for="novo0">Femenino</label>
                        </fieldset>
      </div>

      <div class="col-6">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Insira uma foto" required>
        <div class="invalid-feedback">
          Campo obrigratorio.
        </div>
      </div>
      <div class="col-12">
        <label for="zip" class="form-label" style="opacity: 0;">Botão</label>
        <button type="submit" class="btn btn-outline-info w-100" name="clientCad" id="clientCad">Cadastrar</button>
      </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Já tem uma conta?  <a href="index.php" id="btn-login-volta" class="p-1 nav-link">Iniciar sessão</a></p>
  </form>
        <?php 

            $sqlCategoria = "SELECT * FROM tb_trabalho";
            $resulCategoria = mysqli_query($conexao, $sqlCategoria);
            // $tarefas = array();
          
        ?>
    <!--TELA DE CADASTRO PRESTADOR 3-->
    <form action="conexao/cadastrar.php" method="post" enctype="multipart/form-data" id="benvindo_freelancer" class="d-none">
      <img class="mb-4"  src="img/client101.png" alt="" width="100" height="57">
      <h1 class="h3 mb-3 fw-bold">CRIAR CONTA</h1>
      <div class="row g-3 text-start" >
        <div class="col-6">
          <label for="firstName" class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu primeiro e ultimo nome..." value="" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-6">
          <label for="lastName" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Digite Seu email" value="" required>
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
          <label for="forma" class="form-label">Formação</label>
          <input type="text" class="form-control" id="forma" name="forma" placeholder="Nivel academico ou curso proficional" value="" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
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
          <input type="file" class="form-control" id="Imagem" name="Imagem" placeholder="Insira a sua Foto de perfil" required>
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
         <div class="col-6">
         <fieldset class="mb-3">
              <label for="firstName" class="form-label">Genero</label><br>
                          
            <input type="radio" class="has-validation" name="genero" id="genero1" placeholder="" value="1">
            <label for="genero1">Maculino</label>
            <input type="radio" class="has-validation" name="genero" id="genero0" placeholder="" value="0">
            <label for="genero0">Femenino</label>
                        </fieldset>
      </div>
      <div class="col-6">
          <label for="address" class="form-label">Senha</label>
          <input type="password" class="form-control" id="Senha" name="Senha" placeholder="senha" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="col-6">
          <label for="address2" class="form-label">Confirmar Senha</label>
          <input type="password" class="form-control" id="Senhaconfirmacao" name="Senhaconfirmacao" placeholder="Confirme a sua senha">
        </div>
        <div class="col-12">
          <label for="zip" class="form-label" style="opacity: 0;">Imagen</label>
          <button type="submit" class="btn btn-outline-info w-100" id="cadeFree" name="cadeFree">Cadastrar</button>
        </div>
      </div>
      <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Já tem uma conta?  <a href="index.php" id="btn-volta-login" class="p-1 nav-link">Iniciar sessão</a></p>
    </form>

  <!--TELA ESCOLHER CONTA 2-->
  <form id="tipoconta" class="d-none">
    <img class="mb-4" src="img/client101.png" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-bold">ESCOLHA O TIPO DE CONTA</h1>

    <div class="row">
      <div class="col-6" id="btn-conta-cli">
        <i class="bi bi-person-circle"></i>
        <p>CLIENTE</p>
      </div>
      <div class="col-6" id="btn-conta-free">
        <i class="bi bi-person-circle"></i>
        <p>PRESTADOR DE SERVIÇO</p>
      </div>
    </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>
  </form>

  <!--TELA DE BOAS VINDAS 1-->
  <form id="benvindo-inicio" class="">
    <img class="mb-4" src="img/client101.png" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-bold">BEM VINDO AO JOBS</h1>


    <button class="w-100 btn btn-lg btn-primary my-2" type="button" id="loga-cliente">Logar-se como Cliente</button>
    <button class="w-100 btn btn-lg btn-outline-primary my-3" type="button" id="loga-prestador">Logar-se como Prestador</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>
  </form>

  <!--LOGIN TELA CLIENTE-->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" id="login-cliente" class="d-none">
    <img class="mb-4" src="img/logo.png" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-normal">Faça o seu login</h1>

    <?php
       /* if(!empty($erros)):
          foreach($erros as $erro):
            echo $erro;     
          endforeach;
        endif;	*/
          ?>
          <?php 
            if(!empty($erros)):
              foreach($erros as $erro):
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo $erro;  ?> 
        </div>
        <?php 
             endforeach;
            endif;
        ?>

    <div class="form-floating">
      <input type="text" id="loginome" name="loginome" class="form-control" placeholder="name@example.com">
      <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating">
      <input type="password" id="senhalogin" name="senhalogin" class="form-control" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-0 text-start">
      <label>
        <a href="#" class="nav-link">Esqueci minha senha</a>
      </label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" id="entraLogin" name="entraLogin" type="submit">Entrar</button>
    <a href="index_cliente.php" class="w-100 btn btn-lg btn-primary d-none">Entrar</a>
    <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Não tenho conta?  <a href="#" id="btn-registra" class="p-1 nav-link btn-registra">Registrar-se</a></p>
  </form>

  <!--LOGIN TELA PRESTADOR-->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" id="login-freelancer" class="d-none">
    <img class="mb-4" src="img/logo.png" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-normal">Faça o seu login</h1>

              <?php
          if(!empty($erros)):
            foreach($erros as $erro):
              //echo $erro;
              echo "
              <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    $erro
              </div>
              ";
            endforeach;
          endif;	
          ?>
        

    <div class="form-floating">
      <input type="text" class="form-control" id="loginomeP" name="loginomeP" placeholder="name@example.com">
      <label for="loginome">Nome</label>
    </div>
    <div class="senhalogin">
      <input type="password" class="form-control" id="senhaloginP" name="senhaloginP" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="checkbox mb-0 text-start">
      <label>
        <a href="#" class="nav-link">Esqueci minha senha</a>
      </label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" id="loginEntra" name="loginEntra">Entrar</button>
    <a href="index_cliente.php" class="w-100 btn btn-lg btn-primary d-none">Entrar</a>
    <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Não tenho conta?  <a href="#" id="btn-registraP" class="p-1 nav-link btn-registra">Registrar-se</a></p>
  </form>
</main>


    <footer>

    </footer>
  </body>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <script>

      $("#btn-registra").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").removeClass("d-none");
        $("#voltar-login").removeClass("d-none");
          $("#benvindo-inicio").addClass("d-none");
          $("#voltar-benvindo").addClass("d-none");
      })
     
      $("#voltar-login").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").removeClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#voltar-login").addClass("d-none");
          $("#benvindo-inicio").addClass("d-none");
            $("#voltar-benvindo").removeClass("d-none");
      })
         $("#btn-registraP").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").removeClass("d-none");
        $("#voltar-loginP").removeClass("d-none");
          $("#benvindo-inicio").addClass("d-none");
          $("#voltar-benvindo").addClass("d-none");
      })
       $("#voltar-loginP").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").removeClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#voltar-loginP").addClass("d-none");
          $("#benvindo-inicio").addClass("d-none");
            $("#voltar-benvindo").removeClass("d-none");
      })

      $("#loga-cliente").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").removeClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#benvindo-inicio").addClass("d-none");
        $("#voltar-benvindo").removeClass("d-none");
      })

       $("#loga-prestador").click(()=>{
        //alert("Ola mundo");
        $("#login-freelancer").removeClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#benvindo-inicio").addClass("d-none");
        $("#voltar-benvindo").removeClass("d-none");
      })

      $("#voltar-benvindo").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#benvindo-inicio").removeClass("d-none");
        $("#voltar-benvindo").addClass("d-none");

      })

      $("#btn-conta-cli").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#voltar-escolhe").removeClass("d-none");
        $("#benvindo_cliente").removeClass("d-none");
        $("#benvindo_freelancer").addClass("d-none");
      })

      $("#btn-conta-free").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").addClass("d-none");
        $("#voltar-escolhe").removeClass("d-none");
        $("#benvindo_freelancer").removeClass("d-none");
        $("#benvindo_cliente").addClass("d-none");
      })

      $("#voltar-escolhe").click(()=>{
        //alert("Ola mundo");
        $("#login-cliente").addClass("d-none");
        $("#login-freelancer").addClass("d-none");
        $("#tipoconta").removeClass("d-none");
        $("#voltar-escolhe").addClass("d-none");
        $("#benvindo_freelancer").addClass("d-none");
        $("#benvindo_cliente").addClass("d-none");

      })

  </script>

</html>
