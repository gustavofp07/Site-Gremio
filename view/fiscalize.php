<?php
    include_once __DIR__ . "/../repo/fiscalizeBD.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once __DIR__ . '/../head.php'; ?>
        <title>Fiscalize!</title>
    </head>
    <body id="page-top">
         <?php include_once __DIR__ . '/../menu.php'; ?>
        <!-- Mashead header-->
        <header class="masthead mt-2">
            <div class="container px-2 p-0">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-4 lh-1 mb-3 respt">Fiscalize!</h1>
                            <p class="lead fw-normal text-muted mb-5 resp">Saiba como estão as movimentações financeiras do grêmio.</p>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <figure class="figure">
                            <img src="imagens/fiscal.png" class="figure-img img-fluid rounded" alt="Imagem de um quadrado genérico com bordas arredondadas, em uma figure.">
                        </figure>
                    </div>
                </div>
            </div>
        </header>
        <div class="container px-3 p-0 mt-4">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="mb-5 mb-lg-0 text-center">
                        <h1 class="display-6 lh-1 mb-3 respt">Como funciona o dinheiro do Grêmio?</h1>
                        <p class="lead fw-normal text-muted mb-5 resp text-justify">O dinheiro do Grêmio Estudantil é de todos os sócios (estudantes) que compõem o grêmio. Ao início do ano são feitas arrecadações com vendas de rifas e itens gerais. A partir disso, a Diretoria do Grêmio planeja a utilização dos recursos de acordo com os projetos e sob demanda. Tudo é assinado pelo Conselho Fiscal (Presidente ou Vice-Presidente e Tesoureiros) e deliberado no Conselho de Representantes de Turma.</p>
                        <h1 class="display-6 lh-1 mb-3 respt">Como está o caixa do grêmio atualmente?</h1>
                        <p class="lead fw-normal text-muted mb-4 resp text-justify">O ano orçamentário iniciou-se junto com a posse da gestão (03/01/2024). Até o momento os recursos são:</p><br>
                        <p class="lead fw-normal text-muted mb-2 resp text-justify">Entradas: <?php echo entrada(); ?></p>
                        <p class="lead fw-normal text-muted mb-5 resp text-justify">Saídas: <?php echo saida(); ?> </p>
                        <p class="lead fw-normal text-muted mb- resp text-justify">Os documentos referentes à essa execução do orçamento estão disponíveis <a href="https://drive.google.com/drive/folders/11rqL1DNnQ_KscuW1Rhm-hYLEmdChdEQ1?usp=sharing">aqui</a></p>
                    </div>                    
                </div>
            </div>
        
        <?php include_once __DIR__ . '/../footer.php'; ?>
    </body>
</html>

