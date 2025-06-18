<?php
session_start();

$pageTitle = "Dashboard - αEventos";
require './api/ApiHelper.php';
include './partials/header.php';

$api = new ApiHelper();

// ✅ Verificar tipo de usuário
if (!isset($_SESSION['usuario_tipo'])) {
    header('Location: login.php');
    exit;
}

$tipoUsuario = $_SESSION['usuario_tipo'];
?>

<div class="container py-5">
    <h2 class="text-primary mb-4"><i class="fas fa-chart-bar me-2"></i>Dashboard</h2>

    <?php if ($tipoUsuario == 2): ?>
    <!-- ✅ DASHBOARD - ALUNO -->
    <h4>Meus Eventos Inscritos</h4>
    <div class="row g-3">
        <?php
            $ra = $_SESSION['usuario_ra'];
            $inscricoes = $api->get('inscricoes/usuario/' . $ra);

            if ($inscricoes && is_array($inscricoes)) {
                foreach ($inscricoes as $inscricao) {
            ?>
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5 class="text-primary"><?= htmlspecialchars($inscricao['evento']) ?></h5>
                <p>
                    <i class="fas fa-calendar-day me-1 text-warning"></i><?= htmlspecialchars($inscricao['data']) ?> -
                    <i class="fas fa-clock me-1 text-warning"></i><?= htmlspecialchars($inscricao['hora']) ?>
                </p>

                <!-- Botão de cancelar inscrição -->
                <form method="POST" class="d-inline">
                    <input type="hidden" name="idInscricao" value="<?= intval($inscricao['id']) ?>">
                    <button type="submit" name="cancelar" class="btn btn-danger btn-sm">
                        <i class="fas fa-times me-1"></i> Cancelar Inscrição
                    </button>
                </form>

                <!-- Botão de visualizar certificado -->
                <form method="POST" class="d-inline">
                    <input type="hidden" name="idInscricao" value="<?= intval($inscricao['id']) ?>">
                    <button type="submit" name="certificado" class="btn btn-success btn-sm">
                        <i class="fas fa-file-pdf me-1"></i> Ver Certificado
                    </button>
                </form>
            </div>
        </div>
        <?php
                }
            } else {
                echo '<div class="alert alert-info">Você ainda não está inscrito em nenhum evento.</div>';
            }
            ?>
    </div>

    <?php elseif ($tipoUsuario == 0): ?>
    <!-- ✅ DASHBOARD - ADMIN -->
    <h4>Quantidade de Alunos por Evento</h4>
    <div class="row g-3">
        <?php
            $relatorio = $api->get('relatorios/inscricoes-por-evento');

            if ($relatorio && is_array($relatorio)) {
                foreach ($relatorio as $evento) {
            ?>
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5 class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></h5>
                <p><i class="fas fa-users me-1 text-warning"></i> Inscritos: <?= intval($evento['quantidade']) ?></p>
            </div>
        </div>
        <?php
                }
            } else {
                echo '<div class="alert alert-info">Nenhuma inscrição encontrada até o momento.</div>';
            }
            ?>
    </div>

    <?php else: ?>
    <div class="alert alert-warning">Seu tipo de usuário não tem acesso ao dashboard.</div>
    <?php endif; ?>
</div>

<?php
// ✅ PROCESSAMENTO DE FORMULÁRIOS (cancelar inscrição ou visualizar certificado)

// Cancelar inscrição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelar'])) {
    $id = intval($_POST['idInscricao']);
    $resposta = $api->post('inscricoes/delete', ['id' => $id]); // Exemplo de endpoint (ajustar conforme sua API)
    if ($resposta && isset($resposta['mensagem'])) {
        $_SESSION['mensagem_sucesso'] = 'Inscrição cancelada com sucesso!';
        header('Location: dashboard.php');
        exit;
    }
}

// Visualizar certificado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['certificado'])) {
    echo '<div class="container my-4 text-center">';
    echo '<h5>Seu certificado:</h5>';
    echo '<img src="./img/certificado-exemplo.png" alt="Certificado" class="img-fluid shadow">';
    echo '<div class="mt-3"><a href="dashboard.php" class="btn btn-secondary">Fechar</a></div>';
    echo '</div>';
}
?>

<?php include './partials/footer.php'; ?>