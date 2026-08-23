<?php
  include_once __DIR__ . "/../repo/jornalBD.php";
  $registros = listar();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once __DIR__ . '/../head.php'; ?>
        <title>Jornal</title>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include_once __DIR__ . '/../menu.php'; ?>
        <section id="jornal">
            <div class="container px-5">
              <div class="container px-5 p-0">
                  <div class="row gx-5 align-items-center">
                      <div class="mb-5 mb-lg-0 text-center text-lg-start"></div>
                  </div>
              </div>
                <h1 class="display-6 lh-1 mb-3 text-center mt-4">Jornal</h1>
                <?php if (count($registros) === 0) { ?>
                  <p class="text-center text-muted mt-4">Nenhuma edição publicada até o momento.</p>
                <?php } ?>
                <div class="row">
                <?php
                    foreach($registros as $registro){
                      $dataFormatada = date("d/m/Y", strtotime($registro['dataPublicacao']));
                      echo '<div class="col-md-4">
                      <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title text-center">'.htmlspecialchars($registro['titulo']).'</h5>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="'.htmlspecialchars($registro['url']).'" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary">Ler Edição</a>
                            </div>
                            <small class="text-muted">'.$dataFormatada.'</small>
                          </div>
                        </div>
                      </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php include_once __DIR__ . '/../footer.php'; ?>
    </body>
</html>