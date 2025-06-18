<?php
session_start();
$pageTitle = 'Detalhes do Evento - αEventos';
include '../includes/header.php';
require '../../api/ApiHelper.php';

// Verifica se veio um ID válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo '<div class="container py-5"><div class="alert alert-danger">ID do evento não informado.</div></div>';
    include '../includes/footer.php';
    exit;
}

$eventoId = intval($_GET['id']);
$api = new ApiHelper();

// Buscar o evento na API
$evento = $api->get('eventos/' . $eventoId);

if (!$evento) {
    echo '<div class="container py-5"><div class="alert alert-warning">Evento não encontrado.</div></div>';
    include '../includes/footer.php';
    header('Location: ../error/erro404.php');
    exit;
}

if (!$evento) {

    exit;
}

// Verificar se o usuário está logado e já inscrito
$usuarioLogado = isset($_SESSION['usuario_ra']) && $_SESSION['usuario_tipo'] == 2;
$jaInscrito = false;

if ($usuarioLogado) {
    $inscricoesUsuario = $api->get('inscricoes/usuario/' . $_SESSION['usuario_ra']);
    if ($inscricoesUsuario && is_array($inscricoesUsuario)) {
        foreach ($inscricoesUsuario as $inscricao) {
            if ($inscricao['titulo'] == $evento['titulo']) {
                $jaInscrito = true;
                break;
            }
        }
    }
}
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <img src="../assets/img/eventos/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>"
                alt="<?= htmlspecialchars($evento['titulo']) ?>" class="img-fluid rounded mb-4 shadow-sm">

            <h2 class="mb-3 text-primary"><?= htmlspecialchars($evento['titulo']) ?></h2>

            <ul class="list-unstyled mb-4">
                <li><i class="fas fa-calendar-day me-2 text-warning"></i> Data: <?= htmlspecialchars($evento['data']) ?>
                </li>
                <li><i class="fas fa-clock me-2 text-warning"></i> Horário: <?= htmlspecialchars($evento['hora']) ?>
                </li>
                <li><i class="fas fa-map-marker-alt me-2 text-warning"></i> Local:
                    <?= htmlspecialchars($evento['local'] ?? 'A definir') ?></li>
            </ul>

            <p><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>

            <!-- Botão de Inscrição -->
            <?php if ($usuarioLogado): ?>
                <?php if ($jaInscrito): ?>
                    <button class="btn btn-secondary" disabled>
                        <i class="fas fa-check"></i> Você já está inscrito
                    </button>
                <?php else: ?>
                    <a href="inscrever.php?id=<?= urlencode($evento['id']) ?>" class="btn text-white"
                        style="background-color: #0511F2;">
                        <i class="fas fa-check-circle me-1"></i> Inscrever-se
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btn btn-warning text-dark">
                    <i class="fas fa-sign-in-alt me-1"></i> Faça login para se inscrever
                </a>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header text-white" style="background-color: #0511F2;">
                    <i class="fas fa-info-circle me-2"></i> Informações Rápidas
                </div>
                <div class="card-body">
                    <p><strong>Área:</strong> <?= htmlspecialchars($evento['area']) ?></p>
                    <p><strong>Vagas:</strong> <?= htmlspecialchars($evento['vagas']) ?></p>
                    <p><strong>Palestrante:</strong> <?= htmlspecialchars($evento['palestrante'] ?? 'A definir') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>