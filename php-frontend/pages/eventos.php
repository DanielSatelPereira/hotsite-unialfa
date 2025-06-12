<?php
require_once '../classes/EventoDAO.php';

$area = $_GET['area'] ?? '';
$areasValidas = ['Pedagogia', 'Sistemas para Internet', 'Direito'];

if (!in_array($area, $areasValidas)) {
    header('Location: ../index.php');
    exit;
}

$eventos = EventoDAO::listarPorArea($area);
include '../includes/header.php';
?>

<div class="container py-5">
    <h2 class="mb-4">Eventos de <?= htmlspecialchars($area) ?></h2>

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
        <p>Nenhum evento encontrado para esta área.</p>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>