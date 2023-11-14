<?php
   session_start();
   
   // VERIFICAAÇÃO
   if(!isset($_SESSION['logado'])){
    header('Location: ../index.php');
  }

  include 'conexao.php';

if(isset($_POST['key'])){
    $nome = "%".$_POST['key']."%";
$query = $conexao->prepare('SELECT * FROM tb_prestador WHERE nome_prestador LIKE ? OR categoria_prestador LIKE ?');
$query->execute([$nome, $nome]);
//$dados = $query->fetch(PDO::FETCH_ASSOC);
//print_r($dados);
if ($query->rowCount() > 0) {
    $usuarios = $query->fetchAll();

    foreach ($usuarios as $usuario) {
      //  if($usuario['id_prestador'] == $_SESSION['id_cliente']) continue;

        echo "
    
        <a href='message.php?idPrestador=$usuario[id_prestador]' class='conatiner-fluid d-flex justify-content-around nav-link link-dark' style='margin-top: 5%; position: relative;'>
        <img src='img/$usuario[img_prestador]' style=''>
        
        <p class='text-left' style='text-align: left !important;'>
            <strong>
            $usuario[nome_prestador]
            </strong><br>
            Tens Novas mensagens...
        </p>
        <span class='text-right' style=''>
            22:48<br>
            <label class='text-white' style='background-color: rgba(0,128,192,.9); border-radius: 100%; width: 20px !important; height: 20px !important;'>3</label>
        </span>
        </a>
        <hr>
        ";
    }

    
} else{
   
    echo "
    <div class='alert alert-info alert-dismissible fade show' role='alert'>
    <i class='bi bi-person-x-fill d-block' style='font-size: 3rem;'></i>    
    resultado de busca
    ".htmlspecialchars($_POST['key']) ." não encontrado
 </div>      
    "; 
}

}else{
/*    echo "
    <div class='alert alert-info alert-dismissible fade show' role='alert'>
    <i class='bi bi-person-x-fill d-block' style='font-size: 3rem;'></i>    
        não foram achados nehum dados da pesquisa...
 </div>      
    "; */
} 

  if(isset($_POST['free'])){
    $nome = "%".$_POST['free']."%";
$query = $conexao->prepare('SELECT * FROM tb_cliente WHERE nome_cliente LIKE ? OR numero_cliente LIKE ?');
$query->execute([$nome, $nome]);
//$dados = $query->fetch(PDO::FETCH_ASSOC);
//print_r($dados);
if ($query->rowCount() > 0) {
    $usuarios = $query->fetchAll();

    foreach ($usuarios as $usuario) {
      //  if($usuario['id_prestador'] == $_SESSION['id_cliente']) continue;

        echo "
    
        <a href='messagefree.php?idCliente=$usuario[id_cliente]' class='conatiner-fluid d-flex justify-content-around nav-link link-dark' style='margin-top: 5%; position: relative;'>
        <img src='img/$usuario[img_cliente]' style=''>
        
        <p class='text-left' style='text-align: left !important;'>
            <strong>
            $usuario[nome_cliente]
            </strong><br>
            Ola tudo bem com vc...
        </p>
        <span class='text-right' style=''>
            22:48<br>
            <label class='text-white' style='background-color: rgba(0,128,192,.9); border-radius: 100%; width: 20px !important; height: 20px !important;'>3</label>
        </span>
        </a>
        <hr>
        ";
    }

    
} else{
   
    echo "
    <div class='alert alert-info alert-dismissible fade show' role='alert'>
    <i class='bi bi-person-x-fill d-block' style='font-size: 3rem;'></i>    
    resultado de busca
    ".htmlspecialchars($_POST['free']) ." não encontrado
 </div>      
    "; 
}

}else{
  /*  echo "
    <div class='alert alert-info alert-dismissible fade show' role='alert'>
    <i class='bi bi-person-x-fill d-block' style='font-size: 3rem;'></i>    
        não foram achados nehum dados da pesquisa...
 </div>       
    ";  */
}


