<?php
$pageTitle = 'Erro 403 - Acesso Negado | αEventos';
include './partials/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="mb-4" style="font-size: 5rem;">
                <i class="fas fa-lock text-warning"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">
                <span class="text-muted">Erro</span> 403
            </h1>
            <h2 class="h4 text-muted mb-4">Acesso Proibido</h2>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <p class="lead mb-0">Você não tem permissão para acessar esta página.</p>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-3 mt-5">
                <a href="/" class="btn btn-primary px-4">
                    <i class="fas fa-home me-2"></i>Página Inicial
                </a>
                <a href="login.php" class="btn btn-outline-primary px-4">
                    <i class="fas fa-sign-in-alt me-2"></i>Fazer Login
                </a>
            </div>
        </div>
    </div>
</div>

<?php include './partials/footer.php'; ?>