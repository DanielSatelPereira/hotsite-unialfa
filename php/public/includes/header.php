<?php
// Detecta caminho base para assets
$pathPrefix = file_exists('./assets/css/style.css') ? './' : '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= isset($pageTitle) ? $pageTitle : 'αEventos' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="<?= $pathPrefix ?>assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0511F2;">
        <div class="container-fluid px-4">

            <a class="navbar-brand fw-bold" href="<?= $pathPrefix ?>index.php">
                <i class="fas fa-graduation-cap me-2"></i> αEventos
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarConteudo">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= $pathPrefix ?>index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="<?= $pathPrefix ?>/views/todos_eventos.php">Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $pathPrefix ?>/views/sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                            href="<?= $pathPrefix ?>/views/institucional.php">Institucional</a></li>
                </ul>

                <!-- Search + Botões -->
                <div class="d-flex flex-wrap gap-2">
                    <form class="d-flex flex-grow-1" action="<?= $pathPrefix ?>public/views/search.php" method="get"
                        role="search">
                        <input class="form-control me-2 w-100" type="search" name="q" placeholder="Buscar eventos..."
                            aria-label="Buscar">
                        <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <a href="<?= $pathPrefix ?>login.php" class="btn btn-light"><i class="fas fa-sign-in-alt"></i>
                        Login</a>
                    <a href="<?= $pathPrefix ?>cadastro.php" class="btn btn-warning text-dark"><i
                            class="fas fa-user-plus"></i> Cadastro</a>
                </div>

            </div>
        </div>
    </nav>