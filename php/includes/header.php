<?php
// Configurações essenciais
require_once __DIR__ . '/../../config/config.php';
require_once CLASSES_DIR . '/ApiHelper.php';

// Inicia sessão se necessário
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Dados dinâmicos do header (podem vir do Node.js)
$headerData = ApiHelper::chamarAPI('site/header');
$menuItens = $headerData['menu'] ?? [
    ['url' => '/', 'texto' => 'Home'],
    ['url' => '/frontend/pages/sobre.php', 'texto' => 'Sobre'],
    ['url' => '/frontend/pages/institucional.php', 'texto' => 'Institucional'],
    ['url' => '/frontend/pages/palestrantes.php', 'texto' => 'Palestrantes'],
    ['url' => '/frontend/pages/todos_eventos.php', 'texto' => 'Eventos']
];

$usuarioLogado = $_SESSION['usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle ?? 'αEventos') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="<?= $headerData['meta_descricao'] ?? 'Plataforma de eventos acadêmicos da UniALFA' ?>">

    <!-- Preload de recursos críticos -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="<?= BASE_URL ?>/frontend/assets/css/style.css" as="style">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="<?= BASE_URL ?>/frontend/assets/css/style.css?v=<?= filemtime(BASE_PATH . '/frontend/assets/css/style.css') ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?= BASE_URL ?>/frontend/assets/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>/">
                <i class="fas fa-calendar-check me-1 text-primary"></i><strong>α</strong>Eventos
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo"
                aria-label="Menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarConteudo">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($menuItens as $item): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= str_contains($_SERVER['REQUEST_URI'], $item['url']) ? 'active' : '' ?>"
                                href="<?= BASE_URL . $item['url'] ?>">
                                <?= htmlspecialchars($item['texto']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="d-flex">
                    <?php if ($usuarioLogado): ?>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                                id="dropdownUser" data-bs-toggle="dropdown">
                                <img src="<?= BASE_URL ?>/frontend/assets/img/avatars/<?= $usuarioLogado['avatar'] ?? 'default.png' ?>"
                                    alt="Perfil" width="32" height="32" class="rounded-circle me-2">
                                <span><?= htmlspecialchars($usuarioLogado['nome']) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/perfil">Perfil</a></li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/meus-eventos">Meus Eventos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>/logout">Sair</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/login" class="btn btn-outline-primary me-2">Login</a>
                        <a href="<?= BASE_URL ?>/cadastro" class="btn btn-primary">Cadastre-se</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-4">