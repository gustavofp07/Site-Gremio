<?php
/**
 * Gestões do grêmio (vêm da API, já com os membros), da mais recente para a mais antiga.
 * foto1/foto2 agora são o endereço completo da imagem (ou '' se não houver).
 */

require_once __DIR__ . '/api.php';

function listarGestoes(): array
{
    $gestoes = [];
    foreach (apiGet('gestoes') ?? [] as $g) {
        $gestoes[] = [
            'id' => $g['cdGestao'],
            'nome' => $g['nome'],
            'periodo' => $g['periodo'],
            'descricao' => $g['descricao'],
            'atual' => $g['atual'] ? 1 : 0,
            'foto1' => $g['foto1']['url'] ?? '',
            'foto2' => $g['foto2']['url'] ?? '',
            'integrantes' => $g['membros'] ?? [],
        ];
    }
    return $gestoes;
}

/** Membros de uma gestão (cargo e nome), na ordem de exibição */
function listarIntegrantes($gestao_id): array
{
    foreach (listarGestoes() as $gestao) {
        if ($gestao['id'] == $gestao_id) {
            return $gestao['integrantes'];
        }
    }
    return [];
}

/** Nome da gestão atual (ex.: "Gestão Ecoar"), ou o texto padrão se não houver */
function nomeGestaoAtual(string $padrao = 'Grêmio Estudantil'): string
{
    foreach (listarGestoes() as $gestao) {
        if ($gestao['atual']) {
            return $gestao['nome'];
        }
    }
    return $padrao;
}
