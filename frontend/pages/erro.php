<?php
$msg = $_GET['msg'] ?? null;
$pageTitle = "Erro no sistema";
require_once '../includes/header.php';
?>

<div class="container text-center mt-5 mb-5">
    <h1 class="display-4 text-danger">
        <i class="fas fa-exclamation-triangle"></i> Erro
    </h1>

    <?php if ($msg): ?>
    <div class="alert alert-warning mt-3"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <p class="lead">Algo deu errado ao processar sua solicitação.</p>
    <p class="text-muted">Pedimos desculpas pelo transtorno. Tente novamente mais tarde ou entre em contato com o
        suporte.</p>

    <a href="<?= $baseurl ?>index.php" class="btn btn-outline-primary mt-3">
        <i class="fas fa-home me-2"></i>Voltar para a Home
    </a>
</div>

<?php require_once '../includes/footer.php'; ?>


<!--
Redirecionamento manual para quando se da falha na conexão por exemplo use:
if (!$conexao) {
    header("Location: erro.php");
    exit;
}

Para o redirecionamento com mensagem via GET use:
header("Location: erro.php?msg=" . urlencode("Erro ao buscar eventos."));
exit;
--!>