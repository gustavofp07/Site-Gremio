<?php
/**
 * Notícias (vêm da API). As chaves dos arrays são as mesmas do site antigo
 * (codigo, titulo, subtitulo, texto, dataHorario, edicao) para as páginas não mudarem.
 */

require_once __DIR__ . '/api.php';

function noticiaDaApi(array $n): array
{
    return [
        'codigo' => $n['cdNoticia'],
        'titulo' => $n['titulo'],
        'subtitulo' => $n['subtitulo'] ?? '',
        // HTML do editor, já limpo pela API (scripts removidos)
        'texto' => $n['texto'],
        'dataHorario' => formatarData($n['dtPublicacao'] ?? null),
        'edicao' => formatarData($n['dtEdicao'] ?? null),
    ];
}

/** Todas, mais recentes primeiro */
function listar(): array
{
    return array_map('noticiaDaApi', apiGet('noticias') ?? []);
}

/** As 3 mais recentes (página inicial) */
function listarIndex(): array
{
    return array_map('noticiaDaApi', apiGet('noticias', ['limite' => 3]) ?? []);
}

/** Uma notícia, ou null se não existir */
function buscarPorId($id): ?array
{
    if (!ctype_digit((string) $id)) {
        return null;
    }
    $noticia = apiGet('noticias/' . $id);
    return $noticia ? noticiaDaApi($noticia) : null;
}
