<?php
       $conexao = mysqli_connect('localhost','root','','jobs_bd');
       mysqli_set_charset($conexao, "utf8");

       //CLEAR

	function clear($input){
		global $conexao;
		
		$var = mysqli_escape_string($conexao, $input);
		$var = htmlspecialchars($var);
			return $var;
	}

    if(isset($_POST['serveCad'])){

		$img = $_FILES["imgTrabalho"];
	move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
    $novoNome = $img["name"];
    	
	$descricao = clear($_POST['descTrabalho']);
	$nome = clear($_POST['tipoTrabalho']);
	

	$sql = "INSERT INTO  tb_trabalho (tipo_trabalho, descricao_trabalho, img_categoria, destaque_trabalho) 
	VALUES (
         '$nome', '$descricao', '$novoNome', 1)";

		
		if(mysqli_query($conexao, $sql)){
		//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
			header('Location: servico.php?sucesso');
		}
		//	echo "Cadastro com Sucesso";
			else{
		//	$_SESSION['mensagem'] = "Erro de cadastro";
			header('Location: servico.php?Error');
		//		echo "erro de cadastro";
			}
}


		if (isset($_POST['eliminar'])) {
		
		$apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);
	
		$sql = "DELETE FROM tb_trabalho WHERE id_trabalho = '$apaga_trabalho'"; 

		if(mysqli_query($conexao, $sql)):
		//$_SESSION['mensagem'] = "Excluido com sucesso";
		//header('Location: admin.php?sucesso');
			echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/JOBSfinal/admin/servico.php'>
            <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
		else:
	//	$_SESSION['mensagem'] = "Erro ao Exclur";
		//header('Location: admin.php?Error');
			 echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/JOBSfinal/admin/servico.php'>
            <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>"; 
		endif;
	}


	if(isset($_POST['editar_servico'])):
	$id = mysqli_escape_string($conexao, $_POST['editar_servico']);
	$sql = "SELECT * FROM tb_trabalho WHERE id_trabalho = '$id'";
	$resultado = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_array($resultado);
		//var_dump($dados);
		echo json_encode($dados);
	
	endif;