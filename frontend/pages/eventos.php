<?php
// Configurações
$pageTitle = 'Eventos - αEventos';
require_once 'C:/xampp/htdocs/hotsite-unialfa/backend/php-frontend/config/constants.php';
require_once 'C:/xampp/htdocs/hotsite-unialfa/backend/php-frontend/classes/EventoDAO.php';
require_once 'C:/xampp/htdocs/hotsite-unialfa/backend/php-frontend/classes/CursoDAO.php';
require_once 'C:/xampp/htdocs/hotsite-unialfa/backend/php-frontend/includes/header.php';


// Verifica se há busca ou área válida
$busca = $_GET['q'] ?? null;
$idCurso = $_GET['id'] ?? null;
$titulo = "Todos os Eventos";

// Define título e busca eventos
if ($busca) {
    $eventos = EventoDAO::buscarPorTermo(htmlspecialchars(trim($busca)));
    $titulo = "Resultados para: " . htmlspecialchars($busca);
} elseif ($idCurso && $idCurso > 0) {
    $eventos = EventoDAO::listarPorCurso($idCurso);
    $titulo = "Eventos de " . htmlspecialchars(CursoDAO::getNomeCurso($idCurso));
} else {
    header('Location: ' . BASE_URL . '/');
    exit;
}
?>

<h2 class="mb-4"><?= $titulo ?></h2>

<div class="row g-3">
    <?php if (!empty($eventos)): ?>
    <?php foreach ($eventos as $evento): ?>
    <div class="col-6 col-md-3">
        <a href="<?= BASE_URL ?>/frontend/pages/eventos_detalhe.php?id=<?= $evento['id'] ?>"
            class="text-decoration-none text-dark">
            <div class="card text-center p-2 h-100">
                <strong class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></strong>
                <img src="<?= BASE_URL ?>/frontend/assets/img/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>"
                    class="img-fluid my-2" alt="Imagem do evento <?= htmlspecialchars($evento['titulo']) ?>">
                <small>
                    <?= date('d/m/Y', strtotime($evento['data'])) ?><br>
                    <?= htmlspecialchars($evento['local']) ?><br>
                    <b><?= htmlspecialchars(substr($evento['descricao'], 0, 50)) ?>...</b>
                </small>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="col-12 text-center mt-5">
        <h3 class="text-danger">
            <i class="fas fa-search-minus"></i> Nenhum evento encontrado
        </h3>
        <p class="text-muted">Não encontramos resultados para sua busca.</p>

        <?php if (!empty($busca)): ?>
        <p>Você buscou por: <strong><?= htmlspecialchars($busca) ?></strong></p>
        <?php elseif (!empty($idCurso)): ?>
        <p>Área selecionada: <strong><?= $nomesCursos[$idCurso] ?? 'Área Desconhecida' ?></strong></p>
        <?php endif; ?>

        <a href="<?= BASE_URL ?>/" class="btn btn-outline-primary mt-3">
            <i class="fas fa-arrow-left me-2"></i>Voltar à Home
        </a>
    </div>
    <?php endif; ?>
</div>

<?php include INCLUDES_DIR . '/footer.php'; ?>