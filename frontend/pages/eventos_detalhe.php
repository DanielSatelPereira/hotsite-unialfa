<?php
// Configurações
$pageTitle = 'Detalhes - αEventos';
require_once __DIR__ . '/../../backend/php-frontend/config/constants.php';
require_once __DIR__ . '/../../backend/php-frontend/classes/EventoDAO.php';
require_once __DIR__ . '/../../backend/php-frontend/classes/CursoDAO.php';

// Validação do ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$evento = null;

if ($id) {
    $evento = EventoDAO::buscarPorId($id);
}

// Redirecionamento se não encontrar o evento
if (!$evento) {
    header('Location: ' . BASE_URL . '/frontend/pages/404.php');
    exit;
}

include __DIR__ . '/../../backend/php-frontend/includes/header.php';
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-5">
                <?php
                $imagemEvento = !empty($evento['imagem']) ?
                    BASE_URL . '/frontend/assets/img/' . htmlspecialchars($evento['imagem']) :
                    false;
                ?>
                <?php if ($imagemEvento): ?>
                <img src="<?= $imagemEvento ?>" class="card-img-top img-fluid rounded-top"
                    alt="Imagem do evento <?= htmlspecialchars($evento['titulo']) ?>" loading="lazy">
                <?php else: ?>
                <div class="card-img-top bg-light text-center py-5">
                    <i class="fas fa-image fa-5x text-muted"></i>
                    <p class="mt-2 text-muted">Sem imagem disponível</p>
                </div>
                <?php endif; ?>

                <div class="card-body">
                    <h1 class="card-title text-primary"><?= htmlspecialchars($evento['titulo']) ?></h1>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p class="mb-3">
                                <i class="fas fa-calendar-alt text-secondary me-2"></i>
                                <strong>Data:</strong> <?= date('d/m/Y', strtotime($evento['data'])) ?>
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-clock text-secondary me-2"></i>
                                <strong>Hora:</strong> <?= substr($evento['hora'], 0, 5) ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-3">
                                <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                                <strong>Local:</strong> <?= htmlspecialchars($evento['local']) ?>
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-graduation-cap text-secondary me-2"></i>
                                <strong>Curso:</strong> <?= htmlspecialchars($evento['nome_curso'] ?? 'Geral') ?>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4">
                        <h4 class="text-primary"><i class="fas fa-info-circle me-2"></i>Descrição</h4>
                        <p class="card-text"><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Voltar
                        </a>
                        <a href="<?= BASE_URL ?>/frontend/pages/eventos.php?id=<?= $evento['idCurso'] ?>"
                            class="btn btn-primary">
                            <i class="fas fa-calendar me-2"></i>Mais eventos desta área
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include __DIR__ . '/../../backend/php-frontend/includes/footer.php'; ?>