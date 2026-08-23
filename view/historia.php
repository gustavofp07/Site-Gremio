<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once __DIR__ . '/../head.php'; ?>
        <title>História</title>
    </head>
    <body id="page-top">
        <?php include_once __DIR__ . '/../menu.php'; ?>

        <!-- Cabeçalho da página -->
        <header class="masthead mt-5">
            <div class="container px-2 p-0">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="mb-5 mb-lg-0 text-center">
                            <h1 class="display-4 lh-1 mb-3 respt">Nossa História</h1>
                            <p class="lead fw-normal text-muted mb-5 resp">
                                Conheça todas as gestões que já passaram pelo Grêmio Estudantil Campus Timóteo desde a sua fundação.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Conteúdo das gestões -->
        <div class="container px-3 mt-4 mb-5">

            <?php
            include_once __DIR__ . '/../repo/gestaoBD.php';

            $gestoes = listarGestoes();

            if ($gestoes && count($gestoes) > 0):
                foreach ($gestoes as $index => $gestao):
                    $integrantes = listarIntegrantes($gestao['id']);
                    //$ehAtual = ($gestao['ordem'] == 0); // gestão com ordem 0 fica aberta
                    $ehAtual = ($gestao['atual'] == 1);
                    $collapseId = 'gestao-collapse-' . $gestao['id'];
            ?>

            <!-- CARD DE GESTÃO -->
            <div class="card mb-4 border-0">

                <!-- Cabeçalho do card (clicável para gestões passadas) -->
                <?php if ($ehAtual): ?>
                    <div class="card-header bg-secondary bg-opacity-10 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0 fw-bold"><?= htmlspecialchars($gestao['nome']) ?></h4>
                                <small class="opacity-75"><?= htmlspecialchars($gestao['periodo']) ?></small>
                            </div>
                            <span class="badge bg-light text-dark">Gestão Atual</span>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card-header bg-secondary bg-opacity-10 py-3"
                         data-bs-toggle="collapse"
                         data-bs-target="#<?= $collapseId ?>"
                         aria-expanded="false"
                         aria-controls="<?= $collapseId ?>"
                         style="cursor: pointer;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0 fw-bold"><?= htmlspecialchars($gestao['nome']) ?></h4>
                                <small class="text-muted"><?= htmlspecialchars($gestao['periodo']) ?></small>
                            </div>
                            <i class="bi bi-chevron-down text-secondary fs-5 icone-colapso"></i>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Corpo do card -->
                <div class="<?= $ehAtual ? '' : 'collapse' ?>" id="<?= $collapseId ?>">
                    <div class="card-body px-4 py-4">

                        <!-- Fotos da gestão -->
                        <?php if (!empty($gestao['foto1']) || !empty($gestao['foto2'])): ?>
                        <div class="row gx-3 mb-4 justify-content-center">
                            <?php if (!empty($gestao['foto1'])): ?>
                            <div class="col-12 col-md-<?= !empty($gestao['foto2']) ? '6' : '8' ?>">
                                <img src="../imagens/gestoes/<?= htmlspecialchars($gestao['foto1']) ?>"
                                     class="img-fluid rounded shadow-sm w-100"
                                     style="max-height: 350px; object-fit: cover;"
                                     alt="Foto 1 da <?= htmlspecialchars($gestao['nome']) ?>">
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($gestao['foto2'])): ?>
                            <div class="col-12 col-md-6 mt-3 mt-md-0">
                                <img src="../imagens/gestoes/<?= htmlspecialchars($gestao['foto2']) ?>"
                                     class="img-fluid rounded shadow-sm w-100"
                                     style="max-height: 350px; object-fit: cover;"
                                     alt="Foto 2 da <?= htmlspecialchars($gestao['nome']) ?>">
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <!-- Descrição -->
                        <div class="lead fw-normal text-muted text-justify mb-4">
                            <?= nl2br(htmlspecialchars($gestao['descricao'])) ?>
                        </div>

                        <!-- Lista de integrantes -->
                        <?php if ($integrantes && count($integrantes) > 0): ?>
                        <hr>
                        <h5 class="fw-bold mb-3 mt-3">Membros da Gestão</h5>
                        <div class="row">
                            <?php foreach ($integrantes as $membro): ?>
                            <div class="col-12 col-md-6">
                                <p class="lead fw-normal text-muted resp2 mb-1">
                                    <strong><?= htmlspecialchars($membro['cargo']) ?>:</strong>
                                    <?= htmlspecialchars($membro['nome']) ?>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <?php
                endforeach;
            else:
            ?>
                <div class="text-center py-5">
                    <p class="text-muted lead">Nenhuma gestão cadastrada ainda.</p>
                </div>
            <?php endif; ?>

        </div>

        <?php include_once __DIR__ . '/../footer.php'; ?>

        <!-- Script para girar o ícone de seta ao expandir/colapsar -->
        <script>
            document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function(header) {
                header.addEventListener('click', function() {
                    const icone = this.querySelector('.icone-colapso');
                    if (icone) {
                        icone.classList.toggle('bi-chevron-down');
                        icone.classList.toggle('bi-chevron-up');
                    }
                });
            });
        </script>
    </body>
</html>