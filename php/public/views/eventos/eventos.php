<?php
// Configurações da página
$pageTitle = 'Eventos - αEventos';

// Carrega o header (com session_start() e autoload)
require_once INCLUDES_DIR . '/header.php';

// Validação de parâmetros
$busca = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$idCurso = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$titulo = "Eventos Disponíveis";

// Lógica de busca via API
try {
    if ($busca) {
        // Busca por termo
        $response = ApiHelper::chamarAPI('eventos/busca', ['termo' => $busca], 'POST');
        $titulo = "Resultados para: " . htmlspecialchars($busca);
    } elseif ($idCurso) {
        // Busca por curso
        $response = ApiHelper::chamarAPI("eventos?cursoId=$idCurso");

        // Obtém nome do curso
        $cursoResponse = ApiHelper::chamarAPI("cursos/$idCurso");
        $nomeCurso = $cursoResponse['sucesso'] ? $cursoResponse['dados']['nome'] : 'Área Desconhecida';
        $titulo = "Eventos de " . htmlspecialchars($nomeCurso);
    } else {
        // Redireciona se não tiver parâmetros válidos
        header('Location: ' . BASE_URL . '/');
        exit;
    }

    // Processa resposta
    $eventos = $response['sucesso'] ? $response['dados'] : [];
    $erroApi = $response['sucesso'] ? null : ($response['erro'] ?? 'Erro desconhecido');
} catch (Exception $e) {
    $erroApi = "Serviço temporariamente indisponível";
    error_log("ERRO (eventos.php): " . $e->getMessage());
    $eventos = [];
}
?>

<div class="container py-4">
    <!-- Título e Mensagens -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?= $titulo ?></h2>
        <?php if ($busca): ?>
        <a href="<?= BASE_URL ?>/php/views/eventos/eventos.php" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-times"></i> Limpar busca
        </a>
        <?php endif; ?>
    </div>

    <!-- Mensagens de Erro -->
    <?php if ($erroApi): ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle me-2"></i>
        <?= htmlspecialchars($erroApi) ?>
        <button class="btn btn-sm btn-outline-danger float-end" onclick="window.location.reload()">
            <i class="fas fa-sync-alt"></i> Tentar novamente
        </button>
    </div>
    <?php endif; ?>

    <!-- Lista de Eventos -->
    <div class="row g-4">
        <?php if (!empty($eventos)): ?>
        <?php foreach ($eventos as $evento): ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <!-- Imagem com fallback -->
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="<?= IMG_URL ?>/eventos/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>"
                        class="img-fluid w-100 h-100 object-fit-cover"
                        alt="<?= htmlspecialchars($evento['titulo'] ?? 'Evento') ?>"
                        onerror="this.src='<?= IMG_URL ?>/eventos/default.jpg'">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-truncate">
                        <?= htmlspecialchars($evento['titulo'] ?? 'Evento sem título') ?>
                    </h5>

                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i>
                            <?= isset($evento['data']) ? date('d/m/Y', strtotime($evento['data'])) : '--/--/----' ?>
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i>
                            <?= htmlspecialchars($evento['hora'] ?? '--:--') ?>
                        </span>
                    </div>

                    <p class="card-text text-muted small">
                        <?= htmlspecialchars(substr($evento['descricao'] ?? '', 0, 100)) ?>...
                    </p>
                </div>

                <div class="card-footer bg-white border-0">
                    <a href="<?= BASE_URL ?>/php/views/eventos/eventos_detalhe.php?id=<?= $evento['id'] ?>"
                        class="btn btn-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Detalhes
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col-12 text-center py-5">
            <div class="alert alert-warning">
                <i class="fas fa-inbox me-2"></i> Nenhum evento encontrado
            </div>

            <?php if ($busca): ?>
            <p class="lead">Sua busca por <strong>"<?= htmlspecialchars($busca) ?>"</strong> não retornou resultados.
            </p>
            <?php endif; ?>

            <a href="<?= BASE_URL ?>/" class="btn btn-primary mt-3">
                <i class="fas fa-home me-1"></i> Voltar à página inicial
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
// Carrega o footer
require_once INCLUDES_DIR . '/footer.php';
?>

<!-- Estilos específicos -->
<style>
.card {
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.object-fit-cover {
    object-fit: cover;
}
</style>