<?php

    function pegarUsuario($id_user, $conexao){
        $sql = "SELECT * FROM  tb_cliente WHERE id_cliente=?";
        $stmt = $conexao -> prepare($sql);
        $stmt -> execute([$id_user]);

        if($stmt->rowCount() === 1){
            $user = $stmt->fetch();
            return $user;
        }else{
            $user = [];
            return $user;
        }
    }

    function PegarPrestador($id_free, $conexao){
        $sql = "SELECT * FROM  tb_prestador WHERE id_prestador=?";
        $stmt = $conexao -> prepare($sql);
        $stmt -> execute([$id_free]);

        if($stmt->rowCount() === 1){
            $freelance = $stmt->fetch();
            return $freelance;
        }else{
            $freelance = [];
            return $freelance;
        }
    }

    function PegarChat($id_1, $id_2, $conexao){
        $sql = "SELECT * FROM  chats WHERE (receber_id=? AND enviar_id=?) OR ( enviar_id=? AND receber_id=?) ORDER BY chat_id ASC";

        $stmt = $conexao->prepare($sql);
        $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

        if($stmt->rowCount() > 0){
            $chats = $stmt->fetchAll();
            return $chats;
        }else{
            $chats = [];
            return $chats;
        }

    }

   
    

   