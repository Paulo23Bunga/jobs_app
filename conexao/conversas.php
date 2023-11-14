<?php

    function pegarConversas($user_id, $conexao){

        $sql = "SELECT * FROM conversas WHERE user_1=? OR user_2=? ORDER BY conversa_id DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$user_id, $user_id]);
        if ($stmt->rowCount() > 0) {
            # code...
            $conversas = $stmt->fetchAll();
            
            $user_data = [];

            foreach($conversas as $conversar){
                if($conversar['user_1'] == $user_id){
                   $sql2 = "SELECT * FROM tb_prestador WHERE id_prestador = ?"; 
                   $stmt2 = $conexao->prepare($sql2);
                   $stmt2->execute([$conversar['user_2']]);
                }else{
                    $sql2 = "SELECT * FROM tb_prestador WHERE id_prestador = ?"; 
                   $stmt2 = $conexao->prepare($sql2);
                   $stmt2->execute([$conversar['user_1']]);
                }
                $todasConversas = $stmt2->fetchAll();
                array_push($user_data, $todasConversas[0]);
            }
            return $user_data;
        }else{

            $conversas = [];
            return $conversas;
        }
    } 
    
    function TrazConversas($user_id, $conexao){

        $sql = "SELECT * FROM conversas WHERE user_1=? OR user_2=? ORDER BY conversa_id DESC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$user_id, $user_id]);
        if ($stmt->rowCount() > 0) {
            # code...
            $conversas = $stmt->fetchAll();
            
            $user_data = [];

            foreach($conversas as $conversar){
                if($conversar['user_1'] == $user_id){
                   $sql2 = "SELECT * FROM tb_cliente WHERE id_cliente = ?"; 
                   $stmt2 = $conexao->prepare($sql2);
                   $stmt2->execute([$conversar['user_2']]);
                }else{
                    $sql2 = "SELECT * FROM tb_cliente WHERE id_cliente = ?"; 
                   $stmt2 = $conexao->prepare($sql2);
                   $stmt2->execute([$conversar['user_1']]);
                }

                    $todasConversas = $stmt2->fetchAll();
               
                    array_push($user_data, $todasConversas[0]);
               
                
            }
            return $user_data;
        }else{

            $conversas = [];
            return $conversas;
        }
    } 

