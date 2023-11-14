<?php

$conexao = mysqli_connect('localhost','root','','bd_jobs');
mysqli_set_charset($conexao, "utf8");

if(isset($_POST['enviar'])):

	
	
	$mensagem = $_POST['sms'];
	$receptor = $_POST['receptor'];
	$emisor = $_POST['emissor'];
	
	
	
	$sql = "INSERT INTO chat_jobs(mensagem_chat, id_cliente, id_prestador) 
	VALUES ('$mensagem', '$receptor', '$emisor')";
    
  
		if(mysqli_query($conexao, $sql)):
	//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: exemplo.php?sucesso');
       
	//	echo "Cadastro com Sucesso";
		else:
	//	$_SESSION['mensagem'] = "Erro de cadastro";
		header('Location: exemplo.php?Error');
	//		echo "erro de cadastro";
		endif;
	
	endif;