<?php
session_start();
$pageTitle = "Inscrição no Evento - αEventos";
require '../../api/ApiHelper.php';
include '../includes/header.php';

$api = new ApiHelper();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_ra'])) {
    header('Location: ../../login.php');
    exit;
}

// Verificar se veio um ID de evento
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo '<div class="container py-5"><div class="alert alert-danger">Evento não especificado.</div></div>';
    include '../includes/footer.php';
    exit;
}

$eventoId = intval($_GET['id']);
$evento = $api->get('eventos/' . $eventoId);

if (!$evento || isset($evento['mensagem'])) {
    echo '<div class="container py-5"><div class="alert alert-warning">Evento não encontrado.</div></div>';
    include '../includes/footer.php';
    exit;
}

$mensagem = "";

// Quando o aluno confirmar a inscrição (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'idEvento' => $eventoId,
        'raUsuario' => $_SESSION['usuario_ra']
    ];

    $resultado = $api->post('inscricoes', $dados);

    if ($resultado && isset($resultado['sucesso']) && $resultado['sucesso'] === true) {
        $_SESSION['mensagem_sucesso'] = "Inscrição realizada com sucesso! Venha conhecer outros eventos.";
        header('Location: ../../index.php');
        exit;
    } else {
        $mensagem = "Erro ao realizar a inscrição. Tente novamente.";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: #0511F2;">
                    <h4>Confirmação de Inscrição</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></h5>
                    <p><i class="fas fa-calendar-day me-2 text-warning"></i>Data:
                        <?= htmlspecialchars($evento['data']) ?></p>
                    <p><i class="fas fa-clock me-2 text-warning"></i>Horário: <?= htmlspecialchars($evento['hora']) ?>
                    </p>

                    <?php if (!empty($mensagem)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($mensagem) ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <button type="submit" class="btn text-white" style="background-color: #0511F2;">
                            <i class="fas fa-check-circle me-1"></i> Confirmar Inscrição
                        </button>
                        <a href="../../index.php" class="btn btn-secondary ms-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>