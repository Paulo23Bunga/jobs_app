<?php

session_start();


    if(!isset($_SESSION['logado'])){
    header('Location: ../index.php');
  }

 

  if(isset($_SESSION['id_cliente'])){
  	if (isset($_POST['id_2'])){

		include 'conexao.php';
		include 'pegarusuario.php';

  		$id_1 = $_SESSION['id_cliente'];
  		$id_2 = $_POST['id_2'];
  		$open = 0;

		  $pega_usuario = pegarUsuario($id_1, $conexao);
		  $pega_prestador = PegarPrestador($id_2, $conexao);



  		 $sql = "SELECT * FROM  chats WHERE (receber_id=? AND enviar_id=?) ORDER BY chat_id ASC";

  		$stmt = $conexao->prepare($sql);
        $stmt->execute([$id_1, $id_2]);

          if($stmt->rowCount() > 0){
            $chats = $stmt->fetchAll();
            	foreach ($chats as $chateado) {
            		if ($chateado['abrindo'] == 0) {
            			$abrir = 1;
            			$chat_id = $chateado['chat_id'];

					//	print_r($chat_id);
					

            			$sql2 = "UPDATE chats SET abrindo = ? WHERE chat_id = ?";

            			$stmt2 = $conexao->prepare($sql2);
            			$stmt2->execute([$abrir, $chat_id]); 
						echo "
						<!--MENSSAGEM Q ENTRA -->
						<div class='d-flex justify-content-start mb-4 outgoing_msg py-2'­ id='outgoing_msg'>
				 <div class='img_cont_msg'>
				   <img src='img/$pega_prestador[img_prestador]' class='rounded-circle user_img_msg'>
				 </div>
				  <div class='msg_cotainer sent_msg' id='tamanho2'>
					 <span class='msg_nome'><strong class='text-secondary'>$pega_prestador[nome_prestador]</strong></span>
					 <p id='texto' class='text-dark text-start' > 
					 $chateado[messagem]
					 </p>
					  <span class='msg_time text-secondary'>$chateado[criar_tempo]</span>
				 </div>
				</div>
						
				
						";
            		}
            	}
            //return $chats;
        }else{
            $chats = [];
            return $chats;
        }


  	}
}

if(isset($_SESSION['freeID'])){
  	if (isset($_POST['id_2'])){
  		include 'conexao.php';
		  include 'pegarusuario.php';
	
	
  		$id_1 = $_SESSION['freeID'];
  		$id_2 = $_POST['id_2'];
  		$open = 0;

		  $pega_usuario = pegarUsuario($id_2, $conexao);
		  $pega_prestador = PegarPrestador($id_1, $conexao);


  		 $sql = "SELECT * FROM  chats WHERE (receber_id=? AND enviar_id=?) ORDER BY chat_id ASC";

  		$stmt = $conexao->prepare($sql);
        $stmt->execute([$id_1, $id_2]);

          if($stmt->rowCount() > 0){
            $chats = $stmt->fetchAll();
            	foreach ($chats as $chateado) {
            		if ($chateado['abrindo'] == 0) {
            			$abrir = 1;
            			$chat_id = $chateado['chat_id'];

					//	print_r($chat_id);
					

            			$sql2 = "UPDATE chats SET abrindo = ? WHERE chat_id = ?";

            			$stmt2 = $conexao->prepare($sql2);
            			$stmt2->execute([$abrir, $chat_id]); 
						echo "
						<!--MENSSAGEM Q ENTRA -->
						<div class='d-flex justify-content-start mb-4 outgoing_msg py-2'­ id='outgoing_msg'>
				 <div class='img_cont_msg'>
				   <img src='img/$pega_usuario[img_cliente]' class='rounded-circle user_img_msg'>
				 </div>
				  <div class='msg_cotainer sent_msg' id='tamanho2'>
					 <span class='msg_nome'><strong class='text-secondary'>$pega_usuario[nome_cliente]</strong></span>
					 <p id='texto' class='text-dark text-start' > 
					 $chateado[messagem]
					 </p>
					  <span class='msg_time text-secondary'>$chateado[criar_tempo]</span>
				 </div>
				</div>
						
				
						";

						
            		}
            	}
            //return $chats;
        }else{
            $chats = [];
            return $chats;
        }


  	}
}