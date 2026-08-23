<?php

include_once "banco.php";

function listar(){
    try{
        $sql = "SELECT j.codigo, j.titulo, j.dataPublicacao, a.url
                FROM Jornal j
                INNER JOIN Arquivo a ON a.codigo = j.arquivo_codigo
                ORDER BY j.dataPublicacao DESC;";

        $conexao = criarConexao();
        $sentenca = $conexao->prepare($sql);

        $sentenca->execute();
        $conexao = null;
        return $sentenca->fetchAll();
    }catch (PDOException $erro){
        echo ($erro);
    }
}