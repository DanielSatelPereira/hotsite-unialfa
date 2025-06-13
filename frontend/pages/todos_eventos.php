<?php
require_once '../includes/header.php';
require_once '../dao/EventoDAO.php';

$pageTitle = "Todos os Eventos";

// Captura filtros da URL
$area = $_GET['area'] ?? '';
$termo = $_GET['q'] ?? '';
$eventos = [];

if ($termo) {
    $eventos = EventoDAO::buscarPorTermo($termo);
} elseif ($area) {
    $eventos = EventoDAO::listarPorArea($area);
} else {
    // Busca todos os eventos se não houver filtro
    $eventos = EventoDAO::listarPorArea('%'); // '%' pega todas as áreas se implementar com LIKE
}

$areasDisponiveis = ['Pedagogia', 'Direito', 'Sistemas para Internet']; // pode ser dinâmico no futuro
?>

<div class="container my-4">
    <h1 class="mb-4 text-center"><i class="fas fa-calendar-alt me-2"></i>Todos os Eventos</h1>

    <!-- Formulário de filtro -->
    <form class="row g-2 mb-4" method="GET">
        <div class="col-md-4">
            <input type="text" name="q" class="form-control" placeholder="Buscar por título ou descrição"
                value="<?= htmlspecialchars($termo) ?>">
        </div>
        <div class="col-md-4">
            <select name="area" class="form-select">
                <option value="">Todas as áreas</option>
                <?php foreach ($areasDisponiveis as $opcao): ?>
                <option value="<?= $opcao ?>" <?= $area === $opcao ? 'selected' : '' ?>><?= $opcao ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-filter me-1"></i>Filtrar
            </button>
        </div>
    </form>

    <!-- Resultados -->
    <div class="row g-3">
        <?php if (count($eventos) > 0): ?>
        <?php foreach ($eventos as $evento): ?>
        <div class="col-6 col-md-3">
            <a href="eventos_detalhe.php?id=<?= $evento['id'] ?>" class="text-decoration-none text-dark">
                <div class="card text-center p-2 h-100">
                    <strong class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></strong>
                    <img src="../img/<?= htmlspecialchars($evento['imagem']) ?>" class="img-fluid my-2"
                        alt="Imagem do evento <?= htmlspecialchars($evento['titulo']) ?>">
                    <small>
                        <?= htmlspecialchars($evento['data_evento']) ?><br>
                        <?= htmlspecialchars($evento['local']) ?><br>
                        <b><?= htmlspecialchars($evento['descricao']) ?></b>
                    </small>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col-12 text-center">
            <p class="text-muted">Nenhum evento encontrado com os filtros atuais.</p>
            <a href="<?= $baseurl ?>pages/todos_eventos.php" class="btn btn-outline-secondary mt-2">
                Limpar filtros
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>