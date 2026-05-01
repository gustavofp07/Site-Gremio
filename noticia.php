<?php
  include_once "noticiaBD.php";
  $id = $_GET['codigo'];
  $registro = buscarPorId($id);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
        <title>Notícia</title>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include_once 'menu.php'; ?>
        <section id="noticias mt-4">
            <div class="container px-5 p-0">
                <div class="row gx-5 align-items-center">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">

                    </div>
                </div>
            </div>
            <div class="container px-5 mt-4">
                <h1 class="h3 display-6 lh-1 text-center respt mt-4"><?php echo $registro['titulo']; ?></h1>
                <p class="lead fw-normal text-muted mb-2 resp text-center"><?php echo $registro['subtitulo']; ?></p>
                <div class="row">
                  <p class="lead fw-normal text-muted mb-5 resp text-justify"><?php echo html_entity_decode($registro['texto']); ?></p>
                </div>
                <p class="text-muted mb-2 mt-2 resp text-justify">Publicado em: <?php echo $registro['dataHorario']; ?></p>
                <?php if($registro['edicao'] != ""){
                    echo '<p class="text-muted mb-2 resp text-justify">Editado em:'.$registro['edicao'].'</p>';
                } ?>
                
            </div>
        </section>
        <?php include_once 'footer.php'; ?>
    </body>
</html>