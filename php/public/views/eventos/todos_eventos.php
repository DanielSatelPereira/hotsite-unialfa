<?php
// Configurações
$pageTitle = "Todos os Eventos - αEventos";
require_once __DIR__ . '/../../includes/header.php';

// Filtros
$termo = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$idCurso = filter_input(INPUT_GET, 'curso', FILTER_VALIDATE_INT);

// Busca eventos via API
try {
    // Busca cursos para o dropdown
    $cursosResponse = ApiHelper::chamarAPI('cursos');
    $cursos = $cursosResponse['sucesso'] ? $cursosResponse['dados'] : [];

    // Busca eventos com filtros
    if ($termo) {
        $eventosResponse = ApiHelper::chamarAPI('eventos/busca', ['termo' => $termo], 'POST');
    } elseif ($idCurso) {
        $eventosResponse = ApiHelper::chamarAPI("eventos?cursoId=$idCurso");
    } else {
        $eventosResponse = ApiHelper::chamarAPI('eventos');
    }

    $eventos = $eventosResponse['sucesso'] ? $eventosResponse['dados'] : [];
    $erro = $eventosResponse['sucesso'] ? null : $eventosResponse['erro'];
} catch (Exception $e) {
    $erro = "Erro ao conectar com o servidor";
    error_log("Erro em todos_eventos.php: " . $e->getMessage());
    $eventos = [];
    $cursos = [];
}
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
                        value="<?= htmlspecialchars($termo ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <select name="curso" class="form-select">
                        <option value="">Todos os cursos</option>
                        <?php foreach ($cursos as $curso): ?>
                        <option value="<?= $curso['id'] ?>" <?= ($idCurso == $curso['id']) ? 'selected' : '' ?>>
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

    <!-- Mensagem de erro -->
    <?php if ($erro): ?>
    <div class="alert alert-danger mb-4">
        <i class="fas fa-exclamation-circle me-2"></i>
        <?= htmlspecialchars($erro) ?>
        <button onclick="window.location.reload()" class="btn btn-sm btn-outline-danger float-end">
            <i class="fas fa-sync-alt"></i> Tentar novamente
        </button>
    </div>
    <?php endif; ?>

    <!-- Listagem -->
    <?php if (!empty($eventos)): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($eventos as $evento): ?>
        <?php
                $dataEvento = isset($evento['data']) ? date('d/m/Y', strtotime($evento['data'])) : '--/--/----';
                $imagemEvento = htmlspecialchars($evento['imagem'] ?? 'default.jpg');
                ?>
        <div class="col">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="<?= IMG_URL ?>/eventos/<?= $imagemEvento ?>" class="card-img-top"
                    alt="<?= htmlspecialchars($evento['titulo'] ?? 'Evento') ?>"
                    style="height: 160px; object-fit: cover;" onerror="this.src='<?= IMG_URL ?>/eventos/default.jpg'">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($evento['titulo'] ?? 'Evento sem título') ?></h5>
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> <?= $dataEvento ?>
                        </span>
                        <?php if (!empty($evento['hora'])): ?>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> <?= htmlspecialchars($evento['hora']) ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <p class="card-text"><?= htmlspecialchars(substr($evento['descricao'] ?? '', 0, 100)) ?>...</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="<?= BASE_URL ?>/php/views/eventos/eventos_detalhe.php?id=<?= $evento['id'] ?>"
                        class="btn btn-outline-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
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
        <?php if ($termo || $idCurso): ?>
        <p class="mb-2">
            <?php if ($termo): ?>
            Busca por: <strong>"<?= htmlspecialchars($termo) ?>"</strong>
            <?php endif; ?>
            <?php if ($idCurso): ?>
            Curso selecionado: <strong><?= htmlspecialchars(
                                                        $cursos[array_search($idCurso, array_column($cursos, 'id'))]['nome'] ?? 'Desconhecido'
                                                    ) ?></strong>
            <?php endif; ?>
        </p>
        <?php endif; ?>
        <a href="todos_eventos.php" class="btn btn-primary mt-2">
            <i class="fas fa-times me-1"></i> Limpar filtros
        </a>
    </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

<style>
.hover-lift {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}
</style>