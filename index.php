<?php
  include_once "noticiaBD.php";
  $registros = listarIndex();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head.php'; ?>
        <title>Inicial</title>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5 d-flex justify-content-center">
                <a href="index.php"><img class="img-fluid logo ml-4" src="imagens/logo.jpeg" alt="logo do grêmio"></a>
                <a class="navbar-brand fw-bold" href="#page-top">Grêmio Estudantil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#saiba">Sobre Nós</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#noticias">Notícias</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#fiscalize">Fiscalize!</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="http://registroarmario.gremiotimoteo.online/">Registro de Armário</a></li>
                    </ul>
                    <!--
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Send Feedback</span>
                        </span>
                    </button>-->
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead mt-5">
            <div class="container px-2 p-0">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-4 lh-1 mb-3 respt">A escola é do povo!</h1>
                            <p class="lead fw-normal text-muted mb-5 resp">Na luta por uma instituição melhor e pela educação pública de qualidade</p>

                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <figure class="figure">
                            <img src="imagens/principal2.jpeg" class="figure-img img-fluid rounded" alt="Imagem de um quadrado genérico com bordas arredondadas, em uma figure.">
                            <figcaption class="figure-caption text-center">Jogos de Vôlei, 2023</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </header>
        <aside class="text-center cor p-4" id="saiba">
            <div class="container px-2">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <h6 class="h3 lh-1 mb-3 text-center text-white">Sobre nós</h6>
                        <div class="h6 fw-normal text mb-5 mb-lg-0 text-white mb-4 text-justify">Nós somos o Grêmio Estudantil do CEFET-MG Campus Timóteo. O grêmio é uma entidade estudantil construído pelos estudantes e dirido pela Diretoria do Grêmio, atualmente, a Gestão Avanço. <br><br><a href="sobre.php" class="text-danger">Saiba Mais</a></div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="noticias">
            <div class="container px-3">
                <h1 class="display-6 lh-1 mb-3 text-center">Notícias</h1>
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
                <a href="noticias.php" class="text-dark text-center"><h5>Acesse todas as notícias</h5></a>
            </div>
        </section>
        <!-- Basic features section-->
        <section class="bg-light" id="fiscalize">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4 respt">Fiscalize!</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0 resp text-justify">O Grêmio Estudantil Campus Timóteo preza pela transparência nas ações e uso dos recursos financeiros. Saiba como o dinheiro está sendo utilizado pela entidade! <br><a href="fiscalize.php">Clique Aqui!</a></p>
                    </div>
                    <div class="col-sm-8 col-md-6">
                    <img src="imagens/fiscal.png" class="figure-img img-fluid rounded" alt="Imagem de um quadrado genérico com bordas arredondadas, em uma figure.">
                    </div>
                </div>
            </div>
        </section>
        <?php include_once 'footer.php'; ?>
    </body>
</html>
