<?php
session_start();
$pageTitle = 'Detalhes do Evento - αEventos';
require './api/ApiHelper.php';
require './partials/helpers.php';
include './partials/header.php';

$api = new ApiHelper();

// ✅ Verificar se veio o ID via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: 404.php');
    exit;
}

$idEvento = intval($_GET['id']);

// ✅ Buscar os dados do evento via API Node
$evento = $api->get('eventos/' . $idEvento);

// ✅ Se evento não existir, redirecionar pro erro 404
if (!$evento) {
    header('Location: 404.php');
    exit;
}

// ✅ Verificar se o usuário está logado (tipo aluno) e se já está inscrito
$usuarioLogado = isset($_SESSION['usuario_ra']) && $_SESSION['usuario_tipo'] == 2;
$jaInscrito = false;

if ($usuarioLogado) {
    $inscricoes = $api->get('inscricoes/usuario/' . $_SESSION['usuario_ra']);
    if ($inscricoes && is_array($inscricoes)) {
        foreach ($inscricoes as $inscricao) {
            if ($inscricao['evento'] == $evento['titulo']) {
                $jaInscrito = true;
                break;
            }
        }
    }
}

// ✅ Se o formulário for enviado (tentando se inscrever)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscrever'])) {
    if (!$usuarioLogado) {
        header('Location: login.php');
        exit;
    }

    $dados = [
        'raUsuarios' => intval($_SESSION['usuario_ra']),
        'idEvento' => $idEvento
    ];

    $resultado = $api->post('inscricoes', $dados);

    if ($resultado && isset($resultado['mensagem'])) {
        $_SESSION['mensagem_sucesso'] = 'Inscrição realizada com sucesso!';
        header('Location: dashboard.php');
        exit;
    } else {
        echo '<div class="alert alert-danger text-center">Erro ao realizar a inscrição. Tente novamente.</div>';
    }
}
?>

<div class="container py-5">
    <div class="card shadow-sm">
        <!-- Imagem do evento -->
        <img src="./img/eventos/<?= htmlspecialchars($evento['imagem'] ?? 'default.jpg') ?>" class="card-img-top"
            alt="<?= htmlspecialchars($evento['titulo']) ?>">

        <div class="card-body">
            <!-- Título e descrição -->
            <h3 class="card-title text-primary"><?= htmlspecialchars($evento['titulo']) ?></h3>
            <p class="card-text"><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>

            <!-- Infos principais -->
            <ul class="list-unstyled">
                <li><strong>Data:</strong> <?= htmlspecialchars($evento['data']) ?></li>
                <li><strong>Hora:</strong> <?= htmlspecialchars($evento['hora']) ?></li>
                <li><strong>Local:</strong> <?= htmlspecialchars($evento['local'] ?? 'A definir') ?></li>
            </ul>

            <!-- Inscrição -->
            <?php if ($usuarioLogado): ?>
            <?php if ($jaInscrito): ?>
            <div class="alert alert-success">Você já está inscrito neste evento.</div>
            <?php else: ?>
            <form method="POST">
                <button type="submit" name="inscrever" class="btn btn-success">
                    <i class="fas fa-check-circle me-1"></i> Inscrever-se
                </button>
            </form>
            <?php endif; ?>
            <?php else: ?>
            <a href="login.php" class="btn btn-warning">
                <i class="fas fa-sign-in-alt me-1"></i> Faça login para se inscrever
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include './partials/footer.php'; ?>