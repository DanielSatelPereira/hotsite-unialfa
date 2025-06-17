<?php
$pageTitle = 'Erro 404 - Página Não Encontrada | αEventos';
include '../includes/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <!-- Ícone animado -->
            <div class="mb-4" style="font-size: 5rem;">
                <i class="fas fa-map-marked-alt text-primary"></i>
            </div>

            <!-- Código e título do erro -->
            <h1 class="display-4 fw-bold mb-3">
                <span class="text-muted">Erro</span> 404
            </h1>
            <h2 class="h4 text-muted mb-4">Página Não Encontrada</h2>

            <!-- Mensagem principal -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <p class="lead mb-0">A página que você está procurando não foi encontrada.</p>
                </div>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-center gap-3 mt-5">
                <a href="/" class="btn btn-primary px-4">
                    <i class="fas fa-home me-2"></i>Página Inicial
                </a>

                <a href="/login" class="btn btn-outline-primary px-4">
                    <i class="fas fa-sign-in-alt me-2"></i>Fazer Login
                </a>

                <a href="/contato" class="btn btn-outline-secondary px-4">
                    <i class="fas fa-headset me-2"></i>Suporte
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>