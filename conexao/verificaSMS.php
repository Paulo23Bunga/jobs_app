<?php

session_start();

//echo "Ola mundo";
if(!isset($_SESSION['logado'])){
  header('Location: ../index.php');
}

  if(isset($_SESSION['freeID'])){
    if(isset($_POST['id_2'])){
      require_once 'conectar.php';

    }else{
      
    }
  }
 



/*
if (isset($_GET['id_1'])) {
  require_once 'conectar.php';

  $id = $_GET['id_1'];
  $id2 = $_GET['id_2'];

  $sqlBusca = "SELECT *
  FROM chats, tb_cliente
  WHERE enviar_id = $id
  AND id_cliente = $id
  ORDER BY chat_id"; 

$sqlBusca1 = "SELECT *
FROM chats, tb_prestador
WHERE enviar_id = $id2
AND id_prestador = $id2
ORDER BY chat_id"; 


 // $sqlBusca = "SELECT * FROM chats WHERE enviar_id =  $id";
 //   $sqlBusca = "SELECT * FROM chats  INNER JOIN  tb_cliente ON chats.chat_id = $id AND tb_cliente.id_cliente =  $id";
    $resultado = mysqli_query($conexao, $sqlBusca);
    $resultado1 = mysqli_query($conexao, $sqlBusca1);
   // $tarefas = array();
 //  if(!empty($tarefa1 = mysqli_fetch_assoc($resultado1))){
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
      while ($tarefa1 = mysqli_fetch_array($resultado1)) {
      
     //   $tarefas[] = $tarefa; 
    //    echo $tarefa['messagem'];
        echo "
        <!--MENSSAGEM Q ENTRA -->
        <div class='d-flex justify-content-start mb-4 outgoing_msg py-2'­ id='outgoing_msg'>
 <div class='img_cont_msg'>
   <img src='img/$tarefa[img_cliente]' class='rounded-circle user_img_msg'>
 </div>
  <div class='msg_cotainer sent_msg' id='tamanho2'>
     <span class='msg_nome'><strong class='text-secondary'>$tarefa[nome_cliente]</strong></span>
     <p id='texto' class='text-dark text-start' > 
        $tarefa[messagem] 
     </p>
      <span class='msg_time text-secondary'>$tarefa[criar_tempo]</span>
 </div>
</div>
        

        ";

        echo "
        <div class='d-flex justify-content-end mb-4 incoming_msg' id='incoming_msg'>
        <div class='msg_cotainer_send received_withd_msg' id='tamanho1'>
              <p id='texto' class='text-light text-start'> $tarefa1[messagem]  </p>
              <span class='msg_time_send text-secondary'> $tarefa1[criar_tempo] </span>
         </div>
         <div class='img_cont_msg'>
           <img src='img/$tarefa1[img_prestador]' class='rounded-circle user_img_msg'>
          </div>
      </div>
        

        ";
      //  echo json_encode($tarefa) . "<br>";
    }

 
    }
   // $sqlBusca = "SELECT * FROM chats WHERE enviar_id =  $id";
   //   $sqlBusca = "SELECT * FROM chats  INNER JOIN  tb_cliente ON chats.chat_id = $id AND tb_cliente.id_cliente =  $id";
     
     
}

*/


/*
if (isset($_GET['id_1']) && isset($_GET['id_2'])){
  include 'conexao.php';
  include 'pegarusuario.php';



  $id_1 = $_GET['id_1'];
  $id_2 = $_GET['id_2'];
  $open = 0;

  $id_user1 = pegarUsuario($id_1, $conexao);
  $id_user2 = PegarPrestador($id_2, $conexao);

   $sql = "SELECT COUNT(chat_id) FROM  chats WHERE (receber_id=? AND enviar_id=?) ORDER BY chat_id ASC";

  $stmt = $conexao->prepare($sql);
    $stmt->execute([$id_1, $id_2]);

      $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    //  var_dump($dados);
    //  print_r($dados);

    $sql1 = "SELECT MAX(chat_id), messagem  FROM  chats WHERE (receber_id=? AND enviar_id=?) ORDER BY chat_id ASC";
    $sql2 = "SELECT MAX(chat_id), messagem FROM  chats WHERE (enviar_id=? AND receber_id=? ) ORDER BY chat_id ASC";

    $restou1 = $conexao->prepare($sql2);
    $restou1->execute([$id_1, $id_2]);

    $restou = $conexao->prepare($sql1);
    $restou->execute([$id_1, $id_2]);
    $linhas_chat = $restou->fetch(PDO::FETCH_ASSOC);
    var_dump($linhas_chat);

  //  while(($linhas_chat = $restou->fetch(PDO::FETCH_ASSOC)) AND ($linhas_chat1 = $restou1->fetch(PDO::FETCH_ASSOC))){
      //var_dump($linhas_chat['messagem']);
    //  print_r($linhas_chat['messagem']);
/*
    echo"
    <!--MENSSAGEM Q ENTRA -->
    <div class='d-flex justify-content-start mb-4 outgoing_msg py-2'­ id='outgoing_msg'>
<div class='img_cont_msg'>
<img src='img/$id_user2[img_prestador]' class='rounded-circle user_img_msg'>
</div>
<div class='msg_cotainer sent_msg' id='tamanho2'>
 <span class='msg_nome'><strong class='text-secondary'>$id_user2[nome_prestador]</strong></span>
 <p id='texto' class='text-dark text-start' > 
 $linhas_chat[messagem] 
 </p>
  <span class='msg_time text-secondary'>$linhas_chat[criar_tempo]</span>
</div>
</div>
      
    ";

    echo "
    <div class='d-flex justify-content-end mb-4 incoming_msg' id='incoming_msg'>
    <div class='msg_cotainer_send received_withd_msg' id='tamanho1'>
          <p id='texto' class='text-light text-start'> $linhas_chat1[messagem]  </p>
          <span class='msg_time_send text-secondary'> $linhas_chat1[criar_tempo] </span>
     </div>
     <div class='img_cont_msg'>
       <img src='img/$id_user1[img_cliente]' class='rounded-circle user_img_msg'>
      </div>
  </div>
    

    ";
    */
    /*  extract($linhas_chat);
      $registro = [];
      $registro[] = $chat_id;
      $registro[] = $receber_id;
      $registro[] = $enviar_id;
      $registro[] = $messagem;
      $registro[] = $criar_tempo;

      $dadosChat[] = $registro; */
 //   }

   // var_dump($dadosChat);
  //  print_r($dadosChat);
   

//}