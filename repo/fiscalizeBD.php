<?php

include_once "banco.php";

function entrada(){
    try {
        $sql = "SELECT SUM(valor) AS soma_total
                FROM Movimentacao WHERE tipo = 1";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
    
        $sentenca->execute();     

        // Obtenha o resultado como um array associativo
        $resultado = $sentenca->fetchAll(PDO::FETCH_ASSOC);

        // Feche a conexão
        $conexao = null;

        // Retorna a soma total
        return $resultado[0]['soma_total'];
    } catch (PDOException $erro) {
        // Lida com erros de PDO
        echo ($erro->getMessage());
        return false;
    }
}
function saida(){
    try {
        $sql = "SELECT SUM(valor) AS soma_total
                FROM Movimentacao WHERE tipo = 2";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
    
        $sentenca->execute();     

        // Obtenha o resultado como um array associativo
        $resultado = $sentenca->fetchAll(PDO::FETCH_ASSOC);

        // Feche a conexão
        $conexao = null;

        // Retorna a soma total
        return $resultado[0]['soma_total'];
    } catch (PDOException $erro) {
        // Lida com erros de PDO
        echo ($erro->getMessage());
        return false;
    }
}