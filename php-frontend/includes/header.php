<?php
$baseurl = '/hotsite-unialfa/php-frontend/';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?? 'αEventos' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= $baseurl ?>css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">

            <!-- Logo e nome do site -->
            <a class="navbar-brand fw-bold" href="<?= $baseurl ?>index.php">
                <i class="fas fa-calendar-check me-1 text-primary"></i><strong>α</strong>Eventos
            </a>

            <!-- Botão do menu hamburguer (mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Conteúdo do menu -->
            <div class="collapse navbar-collapse" id="navbarConteudo">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseurl ?>index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseurl ?>pages/sobre.php">Sobre</a>
                    </li>

                    <!-- Outros links de navegação podem ir aqui -->
                </ul>

                <!-- Campo de busca -->
                <form class="d-flex me-3" role="search" method="GET" action="<?= $baseurl ?>pages/eventos.php">
                    <input class="form-control me-2" type="search" name="q" placeholder="Buscar eventos"
                        aria-label="Buscar">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <!-- Botão de login -->
                <a href="#" class="btn btn-primary">Login</a>
            </div>
        </div>
    </nav>

    <main class="container py-4">