<?php

include_once "banco.php";

// Retorna todas as gestões ordenadas do mais recente para o mais antigo
function listarGestoes() {
    try {
        $sql = "SELECT * FROM gestao ORDER BY id DESC";
        //$sql = "SELECT * FROM gestao ORDER BY ordem ASC";
        $conexao = criarConexao();
        $sentenca = $conexao->prepare($sql);
        $sentenca->execute();
        $conexao = null;
        return $sentenca->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        echo $erro;
    }
}

// Retorna todos os integrantes de uma gestão específica
function listarIntegrantes($gestao_id) {
    try {
        $sql = "SELECT cargo, nome FROM integrante WHERE gestao_id = :gestao_id ORDER BY id ASC";
        $conexao = criarConexao();
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':gestao_id', $gestao_id, PDO::PARAM_INT);
        $sentenca->execute();
        $conexao = null;
        return $sentenca->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        echo $erro;
    }
}