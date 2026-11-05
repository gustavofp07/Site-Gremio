<?php
/** Transparência financeira (vem da API): totais já formatados em reais. */

require_once __DIR__ . '/api.php';

function resumoFinanceiro(): ?array
{
    return apiGet('fiscalize');
}

function entrada(): string
{
    $resumo = resumoFinanceiro();
    return $resumo ? formatarDinheiro($resumo['totalEntradas']) : 'indisponível no momento';
}

function saida(): string
{
    $resumo = resumoFinanceiro();
    return $resumo ? formatarDinheiro($resumo['totalSaidas']) : 'indisponível no momento';
}

function saldo(): string
{
    $resumo = resumoFinanceiro();
    return $resumo ? formatarDinheiro($resumo['saldo']) : 'indisponível no momento';
}
