<?php
session_start();

$pageTitle = "Dashboard - αEventos";
require '../../api/ApiHelper.php';
include '../includes/header.php';

// Verificar se está logado
if (!isset($_SESSION['usuario_tipo'])) {
    header('Location: ../../login.php');
    exit;
}

$api = new ApiHelper();

// Verificar o tipo de usuário
$tipoUsuario = $_SESSION['usuario_tipo'];
?>

<div class="container py-5">
    <h2 class="text-primary mb-4"><i class="fas fa-chart-bar me-2"></i>Dashboard</h2>

    <?php if ($tipoUsuario == 2): ?>
    <!-- DASHBOARD DO ALUNO -->
    <h4>Meus Eventos Inscritos</h4>
    <div class="row g-3">
        <?php
            $ra = $_SESSION['usuario_ra'];
            $inscricoes = $api->get('inscricoes/usuario/' . $ra);

            if ($inscricoes && is_array($inscricoes)) {
                foreach ($inscricoes as $inscricao) {
                    echo '<div class="col-md-6">';
                    echo '<div class="card shadow-sm p-3">';
                    echo '<h5 class="text-primary">' . htmlspecialchars($inscricao['titulo']) . '</h5>';
                    echo '<p><i class="fas fa-calendar-day me-1 text-warning"></i>' . htmlspecialchars($inscricao['data']) . ' - <i class="fas fa-clock me-1 text-warning"></i>' . htmlspecialchars($inscricao['hora']) . '</p>';
                    echo '</div></div>';
                }
            } else {
                echo '<div class="alert alert-info">Você ainda não está inscrito em nenhum evento.</div>';
            }
            ?>
    </div>

    <?php elseif ($tipoUsuario == 0): ?>
    <!-- DASHBOARD DO ADMIN -->
    <h4>Quantidade de Alunos por Evento</h4>
    <div class="row g-3">
        <?php
            $relatorio = $api->get('relatorios/inscricoes-por-evento');

            if ($relatorio && is_array($relatorio)) {
                foreach ($relatorio as $evento) {
                    echo '<div class="col-md-6">';
                    echo '<div class="card shadow-sm p-3">';
                    echo '<h5 class="text-primary">' . htmlspecialchars($evento['titulo']) . '</h5>';
                    echo '<p><i class="fas fa-users me-1 text-warning"></i> Inscritos: ' . intval($evento['quantidade']) . '</p>';
                    echo '</div></div>';
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

<?php include '../includes/footer.php'; ?>