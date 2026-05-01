<?php
    $conexao = NULL;
    
    function criarConexao(){        
        $conexao = null;
        try{	        
            //Local
            $conexao = new PDO('mysql:host=localhost; dbname=teste', 'root', '');
            //$conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conexao->exec("SET NAMES 'utf8mb4'");

		}catch (PDOException $erro){
            echo $erro;
            die();
        }	        
        return $conexao;
    }

    function fecharConexao(){
        $conexao = NULL;
    }
?>    
