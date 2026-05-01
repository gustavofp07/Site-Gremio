<?php
  include_once "noticiaBD.php";
  $registros = listar();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
        <title>Notícias</title>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include_once 'menu.php'; ?>
        <section id="noticias">
            <div class="container px-5">
              <div class="container px-5 p-0">
                  <div class="row gx-5 align-items-center">
                      <!-- Mashead text and app badges-->
                      <div class="mb-5 mb-lg-0 text-center text-lg-start">

                      </div>
                  </div>
              </div>
                <h1 class="display-6 lh-1 mb-3 text-center mt-4">Notícias</h1>
                <div class="row">
                <?php	
                    foreach($registros as $registro){
                      echo '<div class="col-md-4">
                      <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title text-center">'.$registro['titulo'].'</h5>
                          <p class="card-text text-muted">'.$registro['subtitulo'].'</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <!--
                            <a href="http://gremiotimoteo.online/noticia.php?codigo='.$registro['codigo'].'" class="btn btn-sm btn-outline-secondary">Ver</a>
                            -->
                            <a href="http://meusprojetos.test/Site-Gremio/noticia.php?codigo='.$registro['codigo'].'" class="btn btn-sm btn-outline-secondary">Ver</a>
                            
                            </div>
                            <small class="text-muted">'.$registro['dataHorario'].'</small>
                          </div>
                        </div>
                      </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php include_once 'footer.php'; ?>
    </body>
</html>
