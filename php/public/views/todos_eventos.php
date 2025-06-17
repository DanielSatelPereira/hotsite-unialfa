<?php
$pageTitle = 'Todos os Eventos - αEventos';
session_start();
require '../../api/ApiHelper.php';
include '../includes/header.php';

$api = new ApiHelper();

// Buscar todos os eventos
$eventos = $api->get('eventos');
?>

<div class="container py-5">
    <h2 class="mb-4 text-primary">Todos os Eventos</h2>

    <!-- Filtro por Área (exemplo futuro: implementar via GET) -->
    <!-- 
    <form method="get" class="mb-4">
        <select name="area" class="form-select w-auto d-inline-block">
            <option value="">Todas as Áreas</option>
            <option value="Pedagogia">Pedagogia</option>
            <option value="Sistemas para Internet">Sistemas para Internet</option>
            <option value="Direito">Direito</option>
        </select>
        <button type="submit" class="btn btn-primary ms-2">Filtrar</button>
    </form>
    -->

    <div class="row g-4">
        <?php if ($eventos && is_array($eventos)): ?>
        <?php foreach ($eventos as $evento): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="../assets/img/eventos/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>"
                        class="img-fluid w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($evento['titulo']) ?>">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-truncate"><?= htmlspecialchars($evento['titulo']) ?></h5>
                    <p class="card-text text-muted small">
                        <?= htmlspecialchars($evento['data']) ?> às <?= htmlspecialchars($evento['hora']) ?>
                    </p>
                    <a href="detalhes.php?id=<?= urlencode($evento['id']) ?>" class="btn text-white"
                        style="background-color: #0511F2;">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="alert alert-warning">Nenhum evento encontrado.</div>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>