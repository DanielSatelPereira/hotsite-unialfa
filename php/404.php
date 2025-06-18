<?php
$pageTitle = 'Erro 404 - Página Não Encontrada | αEventos';
include './partials/header.php';
?>

<div class="card-container" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="card" style="max-width: 600px; text-align: center;">
        <!-- Ícone de erro -->
        <div class="error-icon">
            <i class="fas fa-map-marked-alt" style="color: var(--azul-principal);"></i>
        </div>

        <!-- Título do erro -->
        <h1 style="margin-bottom: 0.5em;">
            <span style="color: gray;">Erro</span> 404
        </h1>
        <h2 style="font-size: 1.2em; color: gray;">Página Não Encontrada</h2>

        <!-- Mensagem -->
        <p class="lead">A página que você está procurando não foi encontrada.</p>

        <!-- Botões -->
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-top: 30px;">
            <a href="/" class="btn-primary"
                style="padding: 10px 20px; border-radius: 5px; color: white; text-decoration: none;">
                <i class="fas fa-home" style="margin-right: 5px;"></i>Página Inicial
            </a>
            <a href="login.php" class="btn-outline-primary"
                style="padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                <i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i>Fazer Login
            </a>
        </div>
    </div>
</div>

<?php include './partials/footer.php'; ?>