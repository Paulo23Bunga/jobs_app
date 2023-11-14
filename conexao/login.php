<?php
// CONEXÃO
require_once 'conectar.php';

//SESSÃO


//$_SESSION['logado'] = false;

//BOTÃO ENVIAR

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
            header('Location: ../index_free.php?sucesso');
        }else{
          //  
            $erros[] = "<li>Usuario e senha não conferem</li>";
            header('Location: ../index.php?Invalido');
        }
        //$dados = mysqli_fetch_array($resultado);

     
        exit();
    } else {
        // Se as credenciais forem inválidas, exiba uma mensagem de erro
      //  echo "Usuário ou senha inválidos.";
        
        $erros[] = "<li> Usuário inexistente </li>";
        header('Location: ../index.php?Sem Registro');
    }
}
    mysqli_close($conexao);
  
?>