<?php
/** Edições do jornal (vêm da API), mais recentes primeiro. */

require_once __DIR__ . '/api.php';

function listar(): array
{
    $edicoes = [];
    foreach (apiGet('jornais') ?? [] as $j) {
        $edicoes[] = [
            'codigo' => $j['cdJornal'],
            'titulo' => $j['titulo'],
            'dataPublicacao' => $j['dtPublicacao'],
            'url' => $j['arquivo']['url'] ?? '#',
        ];
    }
    return $edicoes;
}
