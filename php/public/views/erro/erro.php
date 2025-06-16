<?php
// Configurações básicas
require_once __DIR__ . '/../config/config.php';
require_once CLASSES_DIR . '/ApiHelper.php';

// Tipos de erros suportados
$errorTypes = [
    '400' => 'Requisição Inválida',
    '401' => 'Não Autorizado',
    '403' => 'Acesso Proibido',
    '404' => 'Página Não Encontrada',
    '500' => 'Erro Interno do Servidor',
    '503' => 'Serviço Indisponível'
];

// Obter dados do erro
$errorCode = $_GET['code'] ?? '500';
$errorTitle = $errorTypes[$errorCode] ?? 'Erro no Sistema';
$errorMessage = $_GET['msg'] ?? 'Algo deu errado ao processar sua solicitação.';
$errorDetails = ($_ENV['APP_ENV'] === 'development' && isset($_GET['debug']))
    ? ($_GET['debug'] ?? '')
    : '';

// Logar o erro (opcional)
if ($_ENV['APP_ENV'] === 'production') {
    error_log("Erro {$errorCode}: {$errorMessage} - " . ($_SERVER['REQUEST_URI'] ?? ''));
}

// Configurar título da página
$pageTitle = "{$errorCode} | {$errorTitle}";

// Incluir header
require_once INCLUDES_DIR . '/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <!-- Ícone animado -->
            <div class="mb-4" style="font-size: 5rem;">
                <?php if ($errorCode === '404'): ?>
                <i class="fas fa-map-marked-alt text-primary"></i>
                <?php elseif ($errorCode === '403'): ?>
                <i class="fas fa-lock text-warning"></i>
                <?php else: ?>
                <i class="fas fa-exclamation-triangle text-danger"></i>
                <?php endif; ?>
            </div>

            <!-- Código e título do erro -->
            <h1 class="display-4 fw-bold mb-3">
                <span class="text-muted">Erro</span> <?= $errorCode ?>
            </h1>
            <h2 class="h4 text-muted mb-4"><?= $errorTitle ?></h2>

            <!-- Mensagem principal -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <p class="lead mb-0"><?= htmlspecialchars($errorMessage) ?></p>
                </div>
            </div>

            <!-- Detalhes do erro (apenas em desenvolvimento) -->
            <?php if ($errorDetails): ?>
            <div class="alert alert-dark text-start mt-4">
                <h3 class="h6">Detalhes técnicos:</h3>
                <pre class="mb-0 small"><?= htmlspecialchars($errorDetails) ?></pre>
            </div>
            <?php endif; ?>

            <!-- Ações -->
            <div class="d-flex justify-content-center gap-3 mt-5">
                <a href="<?= BASE_URL ?>/" class="btn btn-primary px-4">
                    <i class="fas fa-home me-2"></i>Página Inicial
                </a>

                <?php if ($errorCode === '403' || $errorCode === '401'): ?>
                <a href="<?= BASE_URL ?>/login" class="btn btn-outline-primary px-4">
                    <i class="fas fa-sign-in-alt me-2"></i>Fazer Login
                </a>
                <?php endif; ?>

                <a href="<?= BASE_URL ?>/contato" class="btn btn-outline-secondary px-4">
                    <i class="fas fa-headset me-2"></i>Suporte
                </a>
            </div>
        </div>
    </div>
</div>

<?php
// Incluir footer
require_once INCLUDES_DIR . '/footer.php';