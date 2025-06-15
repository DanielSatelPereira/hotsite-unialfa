<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>/">
            <img src="<?= BASE_URL ?>/frontend/assets/img/unialfa-logo-navbar.png" alt="UniALFA" height="30"
                class="d-inline-block align-top me-2">
            <span class="text-primary">α</span>Eventos
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarConteudo">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Itens do menu... -->
            </ul>

            <!-- Área de login/usuário (simplificada) -->
            <?php if ($usuarioLogado): ?>
            <div class="dropdown ms-3">
                <button class="btn btn-outline-secondary dropdown-toggle py-1 px-3" type="button"
                    data-bs-toggle="dropdown">
                    <i class="fas fa-user-graduate me-1"></i>
                    <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item small" href="<?= BASE_URL ?>/frontend/pages/logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Sair
                        </a></li>
                </ul>
            </div>
            <?php else: ?>
            <a href="<?= BASE_URL ?>/frontend/pages/login.php?redirect=<?= urlencode($_SERVER['REQUEST_URI']) ?>"
                class="btn btn-outline-primary ms-3 py-1 px-3">
                <i class="fas fa-sign-in-alt me-1"></i>
                <span>Entrar</span>
            </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main class="container py-4">