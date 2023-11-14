<?php

$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");
/*
if(mysqli_connect_errno($conexao)) {
  echo "Problemas para conectar no banco. Verifique os dados!" .mysqli_connect_errno($conexao);
  die();
  }
  */   
/*
    $sqlBusca = 'SELECT * FROM tb_trabalho';
    $resultado = mysqli_query($conexao, $sqlBusca);
   // $tarefas = array();
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
     //   $tarefas[] = $tarefa; 
      //  echo $tarefa['nome'];
        echo json_encode($tarefa) . "<br>";
    }
   */
  /*
    if (mysqli_connect_errno($conexao)) {
      echo "Problemas para conectar no banco. Verifique os dados!" .$conexao;
      die();
      }
      /*
      else{
        $sqlBusca = 'SELECT * FROM tb_servico';
        $resultado = mysqli_query($conexao, $sqlBusca);
       // $tarefas = array();
        while ($tarefa = mysqli_fetch_assoc($resultado)) {
         //   $tarefas[] = $tarefa; 
          //  echo $tarefa['nome'];
            echo json_encode($tarefa) . "<br>";
        }
      }
      */
      