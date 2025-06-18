<?php
$pageTitle = 'Erro 500 - Erro Interno | αEventos';
include './partials/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="mb-4" style="font-size: 5rem;">
                <i class="fas fa-exclamation-triangle text-danger"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">
                <span class="text-muted">Erro</span> 500
            </h1>
            <h2 class="h4 text-muted mb-4">Erro Interno do Servidor</h2>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <p class="lead mb-0">Ocorreu um erro inesperado. Nossa equipe já foi notificada.</p>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-3 mt-5">
                <a href="/" class="btn btn-primary px-4">
                    <i class="fas fa-home me-2"></i>Página Inicial
                </a>
            </div>
        </div>
    </div>
</div>

<?php include './partials/footer.php'; ?>