<?php
//SESSÂO
session_start();

/**CONEXÃO**/
require_once 'conectar.php';
	
//CLEAR

	function clear($input){
		global $conexao;
		
		$var = mysqli_escape_string($conexao, $input);
		$var = htmlspecialchars($var);
			return $var;
	}
	
	if(isset($_POST['clientCad'])):

	
	$img = $_FILES["imagen"];
	move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
    $novoNome = $img["name"];
    	
	$nome = clear($_POST['nome']);
	$email = clear($_POST['email']);
	$telefone = clear($_POST['telefone']);
	$dataNace = clear($_POST['dataNace']);
	$senha = clear($_POST['senha']);
	$senha2 = clear($_POST['senha2']);
	$sexo = clear($_POST['genero']);

	
	$sql = "INSERT INTO tb_cliente (nome_cliente, numero_cliente, endereco_cliente, email_cliente, data_cliente, senha_cliente, genero, img_cliente) 
	VALUES (
         '$nome', '$telefone', '$senha2', '$email',  '$dataNace', '$senha', '$sexo', '$novoNome')";
    
   // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);
	
		if(mysqli_query($conexao, $sql)):
	//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../index.php?sucesso');
       
	//	echo "Cadastro com Sucesso";
		else:
	//	$_SESSION['mensagem'] = "Erro de cadastro";
		header('Location: ../index.php?Error');
	//		echo "erro de cadastro";
		endif;
	
	endif;

	if(isset($_POST['cadeFree'])){

		$img = $_FILES["Imagem"];
	move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
    $novoNome = $img["name"];
    	
	$nome = clear($_POST['nome']);
	$email = clear($_POST['email']);
	$telefone = clear($_POST['contacto']);
	$dataNace = clear($_POST['dataFree']);
	$senha = clear($_POST['Senha']);
	$especialidade = clear($_POST['especialidade']);
	$trabalho = clear($_POST['Profissao']);
	$localidade = clear($_POST['local']);
	$sexo = clear($_POST['genero']);
	$forma = clear($_POST['forma']);

	$sql = "INSERT INTO  tb_prestador (nome_prestador, contacto_prestador, categoria_prestador, senha_prestador, data_prestador, endereco_prestador, email_prestador, formacao_prestador, Genero, img_prestador, ver_tempo, id_trabalho) 
	VALUES (
         '$nome', '$telefone', '$especialidade', '$senha',  '$dataNace', '$localidade', '$email', '$forma', '$sexo', ' $novoNome', 'CURRENT_TIMESTAMP', '$trabalho')";

		
		if(mysqli_query($conexao, $sql)){
		//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
			header('Location: ../index.php?sucesso');
		}
		//	echo "Cadastro com Sucesso";
			else{
		//	$_SESSION['mensagem'] = "Erro de cadastro";
			header('Location: ../index.php?Error');
		//		echo "erro de cadastro";
			}
}


	if(isset($_POST['addServi'])){

		$img = $_FILES["picservi"];
	move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
    $novoNome = $img["name"];
    	
	$descricao = clear($_POST['descservi']);
	$usearioid = clear($_POST['idservi']);
	

	$sql = "INSERT INTO  tb_trabalhos_feitos (descricao_trabalho, pic_trabalho, id_prestador_trabalho) 
	VALUES (
         '$descricao', '$novoNome', '$usearioid')";

		
		if(mysqli_query($conexao, $sql)){
		//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
			header('Location: ../perfilfree.php?sucesso');
		}
		//	echo "Cadastro com Sucesso";
			else{
		//	$_SESSION['mensagem'] = "Erro de cadastro";
			header('Location: ../perfilfree.php?Error');
		//		echo "erro de cadastro";
			}
}




if(isset($_POST['clientAlter'])):

	$id = clear($_POST['alteid']);
	$img = $_FILES["imagen"];
	move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
    $novoNome = $img["name"];
    	
	$nome = clear($_POST['nome']);
	$email = clear($_POST['email']);
	$telefone = clear($_POST['telefone']);
	$dataNace = clear($_POST['dataNace']);
	$senha = clear($_POST['senha']);
	$senha2 = clear($_POST['senha2']);

	
	$sql = "UPDATE tb_cliente SET nome_cliente = '$nome', numero_cliente = '$telefone', endereco_cliente = '$senha2', email_cliente = '$email', data_cliente = '$dataNace', senha_cliente = '$senha', img_cliente = '$novoNome' WHERE id_cliente = '$id'";
    
   // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);
	
		if(mysqli_query($conexao, $sql)):
	//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../perfil.php?sucesso');
       
	//	echo "Cadastro com Sucesso";
		else:
	//	$_SESSION['mensagem'] = "Erro de cadastro";
		header('Location: ../perfil.php?Error');
	//		echo "erro de cadastro";
		endif;
	
	endif;


	if(isset($_POST['alterFree'])){
		$id = clear($_POST['idservi']);
		$img = $_FILES["Imagem"];
	move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
    $novoNome = $img["name"];
    	
	$nome = clear($_POST['nome']);
	$email = clear($_POST['email']);
	$telefone = clear($_POST['contacto']);
	$dataNace = clear($_POST['dataFree']);
	$senha = clear($_POST['Senha']);
	$especialidade = clear($_POST['especialidade']);
	$trabalho = clear($_POST['Profissao']);
	$localidade = clear($_POST['local']);
	$formacao = clear($_POST['formacao']);
	$descricao = clear($_POST['descricao']);

	$sql = "UPDATE tb_prestador SET nome_prestador = '$nome', contacto_prestador = '$telefone', categoria_prestador = '$especialidade', senha_prestador = '$senha', data_prestador = '$dataNace', endereco_prestador = '$localidade', email_prestador = '$email', id_trabalho = '$trabalho', formacao_prestador = '$formacao', 	descricao_prestador = '$descricao', img_prestador = '$novoNome' WHERE id_prestador = '$id'";

		
		if(mysqli_query($conexao, $sql)){
		//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
			header('Location: ../index_free.php?sucesso');
		}
		//	echo "Cadastro com Sucesso";
			else{
		//	$_SESSION['mensagem'] = "Erro de cadastro";
			header('Location: ../index_free.php?Error');
		//		echo "erro de cadastro";
			}
}




	  //FAVORITOS
	  if(isset($_POST['IdBaixar'])){
		$idgosto = $_POST['IdBaixar'];
		$like = $_POST['inputBaixados'];
		$sql = "UPDATE tb_prestador SET destaques = '$like' WHERE id_prestador = '$idgosto'";
		mysqli_query($conexao,$sql);
	 }

	  //SOLICITAÇÕES
	  if(isset($_POST['solicita'])){
		$idsolita = $_POST['solicita'];
		$solconta = $_POST['total'];
		$usuario = $_POST['usuario'];

		$sql = "UPDATE tb_prestador SET solicitacao = '$solconta' WHERE id_prestador = '$idsolita'";
		mysqli_query($conexao,$sql);

		$sql1 =  "INSERT INTO  tb_solicitacao (solicitado, id_prestador, id_cliente) 
	VALUES (
         1, '$idsolita', '$usuario')"; 

		mysqli_query($conexao,$sql1);
	 }

	  //ACEITAR SOLICITAÇÕES
	  if(isset($_POST['solicitaDados'])){
		$idsolita = $_POST['solicitaDados'];
		$usuarioId = $_POST['usuarioDados'];

		$sql = "UPDATE tb_solicitacao SET solicitado = 0 WHERE id_prestador = '$idsolita' AND id_cliente = '$usuarioId'";
		mysqli_query($conexao,$sql);
	 }