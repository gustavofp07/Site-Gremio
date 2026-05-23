<?php

include_once "banco.php";

function listar(){
    try{
        $sql = "SELECT * FROM Noticia ORDER BY dataHorario DESC;";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetchAll();
    }catch (PDOException $erro){
        echo ($erro);
    }
}

function listarIndex(){
    try{
        $sql = "SELECT *
        FROM Noticia
        ORDER BY dataHorario DESC
        LIMIT 3;";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
        
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetchAll();
    }catch (PDOException $erro){
        echo ($erro);
    }
}

function buscarPorId($id){
    try{
        $sql = "SELECT *
        FROM Noticia
        WHERE codigo = :codigo";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':codigo', $id);
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetch();
    }catch (PDOException $erro){
        echo ($erro);
    }
}