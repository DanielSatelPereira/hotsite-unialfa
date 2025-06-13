<?php
$pageTitle = 'Detalhes - αEventos';
require_once '../classes/EventoDAO.php';

$id = $_GET['id'] ?? null;
$evento = null;

if ($id) {
    $evento = EventoDAO::buscarPorId($id);
}

include '../includes/header.php';
?>


<?php if ($evento): ?>
<div class="card p-4 shadow-sm">
    <h2 class="text-primary mb-3"><?= htmlspecialchars($evento['titulo']) ?></h2>
    <img src="../img/<?= htmlspecialchars($evento['imagem']) ?>" class="img-fluid mb-3 rounded"
        alt="Imagem do evento <?= htmlspecialchars($evento['titulo']) ?>">
    <p><strong>Data:</strong> <?= htmlspecialchars($evento['data_evento']) ?></p>
    <p><strong>Local:</strong> <?= htmlspecialchars($evento['local']) ?></p>
    <p><strong>Área:</strong> <?= htmlspecialchars($evento['area']) ?></p>
    <p><strong>Descrição:</strong><br> <?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
    <a href="javascript:history.back()" class="btn btn-outline-secondary mt-3">← Voltar</a>
</div>
<?php else: ?>
<div class="alert alert-warning">Evento não encontrado.</div>
<?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>