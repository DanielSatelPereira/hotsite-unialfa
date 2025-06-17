<?php
$pageTitle = 'Eventos - αEventos';
include '../includes/header.php';
require '../../api/ApiHelper.php';

$api = new ApiHelper();
$eventos = $api->get('eventos');
?>

<div class="container py-4">
    <!-- Título -->
    <div class="mb-4">
        <h2 class="text-primary">Eventos Disponíveis</h2>
    </div>

    <!-- Lista de Eventos -->
    <div class="row g-4">
        <?php if ($eventos && is_array($eventos)): ?>
        <?php foreach ($eventos as $evento): ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="../assets/img/eventos/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>"
                        class="img-fluid w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($evento['titulo']) ?>">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-truncate"><?= htmlspecialchars($evento['titulo']) ?></h5>
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge" style="background-color: #0511F2;">
                            <i class="fas fa-calendar-day me-1"></i> <?= htmlspecialchars($evento['data']) ?>
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> <?= htmlspecialchars($evento['hora']) ?>
                        </span>
                    </div>
                    <p class="card-text text-muted small">
                        <?= htmlspecialchars($evento['descricao']) ?>
                    </p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="detalhes.php?id=<?= urlencode($evento['id']) ?>" class="btn text-white w-100"
                        style="background-color: #0511F2;">
                        <i class="fas fa-info-circle me-1"></i> Detalhes
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col-12">
            <div class="alert alert-warning">Nenhum evento encontrado.</div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>