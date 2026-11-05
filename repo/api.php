<?php
/**
 * Acesso à API do grêmio (rotas públicas /publico/...).
 *
 * apiGet() devolve o JSON já convertido em array, ou null se a API não responder.
 * As respostas ficam guardadas por API_CACHE_SEGUNDOS numa pasta temporária;
 * se a API estiver fora do ar, o site usa a última resposta guardada (mesmo vencida).
 */

require_once __DIR__ . '/config.php';

function apiGet(string $caminho, array $parametros = []): ?array
{
    $url = API_URL . '/publico/' . ltrim($caminho, '/');
    if ($parametros) {
        $url .= '?' . http_build_query($parametros);
    }

    // Cache em memória (mesma página pedindo a mesma coisa duas vezes)
    static $memoria = [];
    if (array_key_exists($url, $memoria)) {
        return $memoria[$url];
    }

    $arquivoCache = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'site-gremio-' . md5($url) . '.json';
    $cacheValido = API_CACHE_SEGUNDOS > 0
        && is_file($arquivoCache)
        && (time() - filemtime($arquivoCache)) < API_CACHE_SEGUNDOS;

    if ($cacheValido) {
        $dados = json_decode((string) file_get_contents($arquivoCache), true);
        return $memoria[$url] = is_array($dados) ? $dados : null;
    }

    $dados = apiRequisitar($url);

    if ($dados !== null) {
        if (API_CACHE_SEGUNDOS > 0) {
            @file_put_contents($arquivoCache, json_encode($dados));
        }
    } elseif (is_file($arquivoCache)) {
        // API fora do ar: usa a última resposta boa
        $antigo = json_decode((string) file_get_contents($arquivoCache), true);
        $dados = is_array($antigo) ? $antigo : null;
    }

    return $memoria[$url] = $dados;
}

/** Faz o GET com cURL. Devolve null em erro (o motivo vai para o log do PHP). */
function apiRequisitar(string $url): ?array
{
    if (!function_exists('curl_init')) {
        error_log('[site-gremio] A extensão cURL do PHP está desativada.');
        return null;
    }

    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        // O Render gratuito "dorme": a primeira chamada pode levar uns 50 segundos
        CURLOPT_TIMEOUT => 60,
        CURLOPT_HTTPHEADER => ['Accept: application/json'],
    ]);

    $corpo = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $erro = curl_error($curl);
    curl_close($curl);

    if ($corpo === false || $status !== 200) {
        error_log("[site-gremio] GET $url falhou (HTTP $status) $erro");
        return null;
    }

    $dados = json_decode($corpo, true);
    return is_array($dados) ? $dados : null;
}

/** "2026-11-05T14:23:00" → "05/11/2026 14:23" (ou só a data) */
function formatarData(?string $data, bool $comHora = true): string
{
    if (!$data) {
        return '';
    }
    $instante = strtotime($data);
    if ($instante === false) {
        return $data;
    }
    return date($comHora ? 'd/m/Y H:i' : 'd/m/Y', $instante);
}

/** 1234.5 → "R$ 1.234,50" */
function formatarDinheiro($valor): string
{
    return 'R$ ' . number_format((float) $valor, 2, ',', '.');
}

/** Escapa texto para HTML (atalho) */
function e(?string $texto): string
{
    return htmlspecialchars($texto ?? '', ENT_QUOTES, 'UTF-8');
}
