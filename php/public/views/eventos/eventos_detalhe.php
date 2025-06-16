<?php
$pageTitle = 'Detalhes - αEventos';
require_once __DIR__ . '/../../includes/header.php';

// Validação e obtenção do ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: ' . BASE_URL . '/php/views/error/404.php');
    exit;
}

// Busca evento via API
try {
    $eventoResponse = ApiHelper::chamarAPI("eventos/$id");

    if (!$eventoResponse['sucesso'] || empty($eventoResponse['dados'])) {
        header('Location: ' . BASE_URL . '/php/views/error/404.php');
        exit;
    }

    $evento = $eventoResponse['dados'];

    // Busca curso se necessário
    if (isset($evento['curso_id'])) {
        $cursoResponse = ApiHelper::chamarAPI("cursos/{$evento['curso_id']}");
        $evento['nome_curso'] = $cursoResponse['sucesso'] ? $cursoResponse['dados']['nome'] : 'Geral';
    }
} catch (Exception $e) {
    error_log("Erro ao buscar evento: " . $e->getMessage());
    header('Location: ' . BASE_URL . '/php/views/error/500.php');
    exit;
}

// Verifica se usuário está logado
$usuarioLogado = isset($_SESSION['usuario']);

// Processa imagem
$imagemEvento = !empty($evento['imagem'])
    ? IMG_URL . '/eventos/' . htmlspecialchars($evento['imagem'])
    : null;
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-5 border-0">

                <!-- Imagem do Evento -->
                <?php if ($imagemEvento): ?>
                <img src="<?= $imagemEvento ?>" class="card-img-top img-fluid rounded-top-3"
                    alt="Imagem do evento <?= htmlspecialchars($evento['titulo'] ?? 'Evento') ?>" loading="lazy"
                    onerror="this.src='<?= IMG_URL ?>/eventos/default.jpg'">
                <?php else: ?>
                <div class="card-img-top bg-light text-center py-5 rounded-top-3">
                    <i class="fas fa-image fa-5x text-muted"></i>
                    <p class="mt-2 text-muted">Sem imagem disponível</p>
                </div>
                <?php endif; ?>

                <div class="card-body">
                    <!-- Título -->
                    <h1 class="card-title text-primary mb-4">
                        <?= htmlspecialchars($evento['titulo'] ?? 'Evento sem título') ?>
                    </h1>

                    <!-- Metadados -->
                    <div class="row mt-4 g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-calendar-alt text-secondary me-3 fs-4"></i>
                                <div>
                                    <h5 class="mb-0 text-muted small">Data</h5>
                                    <p class="mb-0">
                                        <?= isset($evento['data']) ? date('d/m/Y', strtotime($evento['data'])) : '--/--/----' ?>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-clock text-secondary me-3 fs-4"></i>
                                <div>
                                    <h5 class="mb-0 text-muted small">Hora</h5>
                                    <p class="mb-0">
                                        <?= !empty($evento['hora']) ? substr($evento['hora'], 0, 5) : '--:--' ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt text-secondary me-3 fs-4"></i>
                                <div>
                                    <h5 class="mb-0 text-muted small">Local</h5>
                                    <p class="mb-0">
                                        <?= htmlspecialchars($evento['local'] ?? 'Local não definido') ?>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-graduation-cap text-secondary me-3 fs-4"></i>
                                <div>
                                    <h5 class="mb-0 text-muted small">Área</h5>
                                    <p class="mb-0">
                                        <?= htmlspecialchars($evento['nome_curso'] ?? 'Geral') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Descrição -->
                    <div class="mt-4">
                        <h4 class="text-primary mb-3">
                            <i class="fas fa-info-circle me-2"></i>Descrição
                        </h4>
                        <div class="card-text">
                            <?= nl2br(htmlspecialchars($evento['descricao'] ?? 'Descrição não disponível')) ?>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="d-flex justify-content-between mt-5">
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Voltar
                        </a>
                        <?php if (isset($evento['curso_id'])): ?>
                        <a href="<?= BASE_URL ?>/php/views/eventos/eventos.php?id=<?= $evento['curso_id'] ?>"
                            class="btn btn-primary">
                            <i class="fas fa-calendar me-2"></i>Mais eventos desta área
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Bloco de Inscrição -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body">
                    <?php if ($usuarioLogado): ?>
                    <?php
                        // Verifica disponibilidade via API
                        $disponivelResponse = ApiHelper::chamarAPI("eventos/$id/disponibilidade");
                        $disponivel = $disponivelResponse['sucesso'] && $disponivelResponse['disponivel'];
                        ?>

                    <?php if ($disponivel): ?>
                    <a href="<?= BASE_URL ?>/php/views/inscricoes/inscrever.php?evento_id=<?= $evento['id'] ?>"
                        class="btn btn-success btn-lg w-100 py-3">
                        <i class="fas fa-calendar-check me-2"></i> Realizar Inscrição
                    </a>
                    <?php else: ?>
                    <div class="alert alert-warning mb-0 text-center">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= $disponivelResponse['mensagem'] ?? 'Inscrições encerradas para este evento' ?>
                    </div>
                    <?php endif; ?>
                    <?php else: ?>
                    <div class="text-center p-4">
                        <h5 class="text-primary mb-3">
                            <i class="fas fa-lock me-2"></i>Acesso Restrito
                        </h5>
                        <p class="mb-4">Para se inscrever neste evento, faça login com seu RA UniALFA</p>
                        <a href="<?= BASE_URL ?>/php/login.php?redirect=<?= urlencode($_SERVER['REQUEST_URI']) ?>"
                            class="btn btn-primary px-4">
                            <i class="fas fa-sign-in-alt me-2"></i> Fazer Login
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

<style>
.rounded-top-3 {
    border-top-left-radius: 1rem !important;
    border-top-right-radius: 1rem !important;
}
</style>