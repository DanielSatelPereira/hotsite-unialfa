<?php
$pageTitle = 'Eventos - αEventos';
require_once '../classes/EventoDAO.php';

$busca = $_GET['q'] ?? null;
$area = $_GET['area'] ?? null;
$areasValidas = ['Pedagogia', 'Sistemas para Internet', 'Direito'];

// Define título e busca eventos
if ($busca) {
    $eventos = EventoDAO::buscarPorTermo($busca);
    $titulo = "Resultados para: " . htmlspecialchars($busca);
} elseif (in_array($area, $areasValidas)) {
    $eventos = EventoDAO::listarPorArea($area);
    $titulo = "Eventos de " . htmlspecialchars($area);
} else {
    header('Location: ../index.php');
    exit;
}

include '../includes/header.php';
?>

<h2 class="mb-4"><?= $titulo ?></h2>

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
    <p class="text-muted">Nenhum evento encontrado.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>