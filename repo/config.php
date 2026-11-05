<?php
/**
 * Configuração do site.
 *
 * O endereço da API vem da variável de ambiente GREMIO_API_URL (se a hospedagem permitir)
 * ou do valor padrão abaixo. Para publicar, troque o padrão pelo endereço do Render.
 * Aqui não há senha nenhuma: o site só usa as rotas públicas da API.
 */

date_default_timezone_set('America/Sao_Paulo');

define('API_URL', rtrim(getenv('GREMIO_API_URL') ?: 'http://localhost:8080/api/v1', '/'));

// Por quantos segundos guardar as respostas da API (deixa o site rápido e
// segura o site no ar por um tempo se a API cair). 0 = sem cache.
define('API_CACHE_SEGUNDOS', 60);

// Endereço do app de armários dos alunos (Netlify)
define('URL_ARMARIOS', 'https://armarios.gremiotimoteo.online/');
