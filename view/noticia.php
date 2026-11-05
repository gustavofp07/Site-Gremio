<?php
  include_once __DIR__ . "/../repo/noticiaBD.php";
  $registro = buscarPorId($_GET['codigo'] ?? '');
  if ($registro === null) {
      http_response_code(404);
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once __DIR__ . '/../head.php'; ?>
        <title><?= $registro ? e($registro['titulo']) : 'Notícia não encontrada' ?></title>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include_once __DIR__ . '/../menu.php'; ?>
        <section id="noticias" class="mt-4">
            <div class="container px-5 mt-4">
            <?php if ($registro === null) { ?>
                <h1 class="h3 display-6 lh-1 text-center respt mt-4">Notícia não encontrada</h1>
                <p class="text-center text-muted mt-3"><a href="noticias.php">Ver todas as notícias</a></p>
            <?php } else { ?>
                <h1 class="h3 display-6 lh-1 text-center respt mt-4"><?= e($registro['titulo']) ?></h1>
                <p class="lead fw-normal text-muted mb-2 resp text-center"><?= e($registro['subtitulo']) ?></p>
                <!-- O texto é HTML do editor, já limpo pela API -->
                <div class="lead fw-normal text-muted mb-5 resp text-justify texto-noticia"><?= $registro['texto'] ?></div>
                <p class="text-muted mb-2 mt-2 resp text-justify">Publicado em: <?= e($registro['dataHorario']) ?></p>
                <?php if ($registro['edicao'] !== '') { ?>
                    <p class="text-muted mb-2 resp text-justify">Editado em: <?= e($registro['edicao']) ?></p>
                <?php } ?>
            <?php } ?>
            </div>
        </section>
        <?php include_once __DIR__ . '/../footer.php'; ?>
    </body>
</html>
