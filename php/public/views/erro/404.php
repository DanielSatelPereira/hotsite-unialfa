<?php

/**
 * Página de Erro 404 - Recurso Não Encontrado
 * 
 * Exibida quando um usuário tenta acessar uma URL que não existe
 */

// 1. Carrega configurações globais
require_once __DIR__ . '/../config/config.php';

// 2. Configurações da página
$pageTitle = "Página não encontrada | " . SITE_NAME;
$currentUrl = $_SERVER['REQUEST_URI'] ?? '';

// 3. Define cabeçalho HTTP correto
header("HTTP/1.0 404 Not Found");

// 4. Carrega o cabeçalho
require_once INCLUDES_DIR . '/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <!-- Ícone animado -->
            <div class="mb-4" style="font-size: 5rem;">
                <i class="fas fa-map-marked-alt text-primary"></i>
            </div>

            <!-- Código e título do erro -->
            <h1 class="display-1 fw-bold text-muted mb-3">404</h1>
            <h2 class="h2 mb-4">Ops! Página não encontrada</h2>

            <!-- Mensagem principal -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body py-4">
                    <p class="lead mb-3">A página que você tentou acessar não existe ou foi movida.</p>
                    <?php if (ENVIRONMENT === 'development'): ?>
                        <p class="text-muted small mb-0">
                            URL acessada: <code><?= htmlspecialchars($currentUrl) ?></code>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sugestões de conteúdo -->
            <div class="mb-5">
                <h3 class="h5 mb-3">Talvez você queira:</h3>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="<?= url('/') ?>" class="btn btn-outline-primary">
                        <i class="fas fa-home me-2"></i>Voltar à página inicial
                    </a>
                    <a href="<?= url('/eventos') ?>" class="btn btn-outline-primary">
                        <i class="fas fa-calendar-alt me-2"></i>Ver eventos
                    </a>
                    <a href="<?= url('/contato') ?>" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>Falar com suporte
                    </a>
                </div>
            </div>

            <!-- Busca (opcional) -->
            <div class="card border-0 shadow-sm">
                <div class="card-body py-4">
                    <h3 class="h5 mb-3">Encontre o que precisa:</h3>
                    <form action="<?= url('/busca') ?>" method="get" class="d-flex">
                        <input type="search" name="q" class="form-control me-2" placeholder="Digite sua busca..."
                            aria-label="Busca">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            <span class="visually-hidden">Buscar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// 6. Carrega o rodapé
require_once INCLUDES_DIR . '/footer.php';
