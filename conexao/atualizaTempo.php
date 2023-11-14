<?php
     session_start();

     // VERIFICAAÇÃO
     if(!isset($_SESSION['logado'])){
      header('Location: ../index.php');
    }

    include 'conexao.php';

    $id_time = $_SESSION['id_cliente'];

    $sql = "UPDATE tb_prestador SET ver_tempo = NOW() WHERE id_prestador = ?";
   // $sql = "UPDATE tb_cliente SET ver_tempo = NOW() WHERE id_cliente = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id_time]);