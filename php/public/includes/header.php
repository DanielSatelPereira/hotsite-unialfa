<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <<title><?= htmlspecialchars($pageTitle ?? 'αEventos') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Plataforma de eventos acadêmicos da UniALFA">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header simplificado -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-calendar-check me-1 text-primary"></i><strong>α</strong>Eventos
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarConteudo">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/institucional">Institucional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/eventos">Eventos</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                    <a href="/cadastro" class="btn btn-primary">Cadastre-se</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-4">