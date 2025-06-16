<?php
// Configurações
$pageTitle = "Todos os Eventos - αEventos";
require_once __DIR__ . '/../../backend/php-frontend/config/constants.php';
require_once __DIR__ . '/../../backend/php-frontend/classes/EventoDAO.php';
require_once __DIR__ . '/../../backend/php-frontend/classes/CursoDAO.php';
require_once __DIR__ . '/../../backend/php-frontend/includes/header.php';

// Filtros
$termo = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$idCurso = filter_input(INPUT_GET, 'curso', FILTER_VALIDATE_INT);

// Busca eventos
if ($termo) {
    $eventos = EventoDAO::buscarPorTermo($termo);
} elseif ($idCurso) {
    $eventos = EventoDAO::listarPorCurso($idCurso);
} else {
    $eventos = EventoDAO::listarTodos();
}

$cursos = CursoDAO::listarTodos();
?>

<div class="container my-4">
    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-calendar-alt me-2"></i>Todos os Eventos</h1>
        <span class="badge bg-primary"><?= count($eventos) ?> eventos</span>
    </div>

    <!-- Filtros -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="q" class="form-control" placeholder="Buscar eventos..."
                        value="<?= htmlspecialchars($termo) ?>">
                </div>
                <div class="col-md-4">
                    <select name="curso" class="form-select">
                        <option value="">Todos os cursos</option>
                        <?php foreach ($cursos as $curso): ?>
                        <option value="<?= $curso['id'] ?>" <?= $idCurso == $curso['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($curso['nome']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-1"></i> Filtrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Listagem -->
    <?php if (!empty($eventos)): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($eventos as $evento): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= BASE_URL ?>/frontend/assets/img/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>"
                    class="card-img-top" alt="<?= htmlspecialchars($evento['titulo']) ?>"
                    style="height: 160px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($evento['titulo']) ?></h5>
                    <p class="card-text text-muted small">
                        <i class="fas fa-calendar-day me-1"></i>
                        <?= date('d/m/Y', strtotime($evento['data'])) ?>
                    </p>
                    <p class="card-text"><?= htmlspecialchars(substr($evento['descricao'], 0, 100)) ?>...</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="<?= BASE_URL ?>/frontend/pages/eventos_detalhe.php?id=<?= $evento['id'] ?>"
                        class="btn btn-outline-primary w-100">
                        Ver Detalhes
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="alert alert-warning text-center py-4">
        <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
        <h4>Nenhum evento encontrado</h4>
        <a href="todos_eventos.php" class="btn btn-primary mt-2">
            Limpar filtros
        </a>
    </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../../backend/php-frontend/includes/footer.php'; ?>