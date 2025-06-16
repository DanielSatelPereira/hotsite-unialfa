<?php
// Configurações
$pageTitle = 'Eventos - αEventos';

require_once __DIR__ . '/../../backend/php-frontend/includes/header.php';

// Validação de parâmetros
$busca = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$idCurso = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$titulo = "Todos os Eventos";

// Lógica de busca
if ($busca) {
    $eventos = EventoDAO::buscarPorTermo($busca);
    $titulo = "Resultados para: " . htmlspecialchars($busca);
} elseif ($idCurso) {
    $eventos = EventoDAO::listarPorCurso($idCurso);
    $nomeCurso = CursoDAO::getNomeCurso($idCurso);
    $titulo = "Eventos de " . htmlspecialchars($nomeCurso);
} else {
    header('Location: ' . BASE_URL . '/');
    exit;
}
?>

<h2 class="mb-4"><?= $titulo ?></h2>

<div class="row g-3">
    <?php if (!empty($eventos)): ?>
        <?php foreach ($eventos as $evento): ?>
            <?php
            // Pré-processamento dos dados
            $idEvento = $evento['id'];
            $tituloEvento = htmlspecialchars($evento['titulo']);
            $imagemEvento = htmlspecialchars($evento['imagem'] ?? 'default.jpg');
            $dataEvento = date('d/m/Y', strtotime($evento['data']));
            $localEvento = htmlspecialchars($evento['local']);
            $descricaoResumida = htmlspecialchars(substr($evento['descricao'], 0, 50));
            ?>

            <div class="col-6 col-md-3">
                <a href="<?= BASE_URL ?>/frontend/pages/eventos_detalhe.php?id=<?= $idEvento ?>"
                    class="text-decoration-none text-dark" aria-label="Ver detalhes do evento <?= $tituloEvento ?>">
                    <div class="card text-center p-2 h-100">
                        <strong class="text-primary"><?= $tituloEvento ?></strong>
                        <img src="<?= BASE_URL ?>/frontend/assets/img/<?= $imagemEvento ?>" class="img-fluid my-2"
                            alt="Capa do evento <?= $tituloEvento ?>" loading="lazy">
                        <small>
                            <?= $dataEvento ?><br>
                            <?= $localEvento ?><br>
                            <b><?= $descricaoResumida ?>...</b>
                        </small>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center mt-5">
            <div class="alert alert-warning">
                <i class="fas fa-search-minus"></i> Nenhum evento encontrado
            </div>

            <?php if ($busca): ?>
                <p>Você buscou por: <strong><?= htmlspecialchars($busca) ?></strong></p>
            <?php elseif ($idCurso): ?>
                <p>Área selecionada: <strong><?= htmlspecialchars($nomeCurso ?? 'Área Desconhecida') ?></strong></p>
            <?php endif; ?>

            <a href="<?= BASE_URL ?>/" class="btn btn-outline-primary mt-3">
                <i class="fas fa-arrow-left me-2"></i>Voltar à Home
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../../backend/php-frontend/includes/footer.php'; ?>