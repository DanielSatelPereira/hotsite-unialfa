<?php
include 'classes/EventoDAO.php';
$eventosPedagogia = EventoDAO::listarPorArea('Pedagogia');
$eventosSistemas = EventoDAO::listarPorArea('Sistemas para Internet');
$eventosDireito = EventoDAO::listarPorArea('Direito');
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniALFA Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
        <a class="navbar-brand" href="#"><strong>a</strong>Eventos</a>
        <div class="ms-auto d-flex align-items-center">
            <input class="form-control me-2" type="search" placeholder="Procurar eventos">
            <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
            <a href="#" class="btn btn-dark ms-3">Cadastro / Login</a>
        </div>
    </nav>

    <div id="carouselEventos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1200x400.png" text="Banner+Vestibular+de+Inverno+UniALFA"
                    class="d-block w-100" alt="Banner do Evento">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselEventos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselEventos" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container py-5">
        <h3 class="mb-4">Eventos por área</h3>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">

            <div class="col">
                <a href="eventos.php?area=Pedagogia" class="text-decoration-none text-dark">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-chalkboard-teacher fa-2x mb-2 text-primary"></i>
                            <p class="card-text fw-bold">Pedagogia</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="eventos.php?area=Sistemas" class="text-decoration-none text-dark">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-laptop-code fa-2x mb-2 text-success"></i>
                            <p class="card-text fw-bold">Sistemas</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="eventos.php?area=Direito" class="text-decoration-none text-dark">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-balance-scale fa-2x mb-2 text-danger"></i>
                            <p class="card-text fw-bold">Direito</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>


    <!-- Pedagogia -->
    <div class="container">
        <h5 class="fw-bold my-4">Pedagogia</h5>
        <div class="row g-3">
            <?php foreach ($eventosPedagogia as $evento): ?>
            <div class="col-6 col-md-3">
                <div class="card text-center p-2 h-100">
                    <strong class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></strong>
                    <img src="img/<?= htmlspecialchars($evento['imagem']) ?>" class="img-fluid my-2"
                        alt="Imagem do evento">
                    <small>
                        <?= htmlspecialchars($evento['data_evento']) ?><br>
                        <?= htmlspecialchars($evento['local']) ?><br>
                        <b><?= htmlspecialchars($evento['descricao']) ?></b>
                    </small>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Sistemas para Internet -->
    <div class="container">
        <h5 class="fw-bold my-4">Sistemas para Internet</h5>
        <div class="row g-3">
            <?php foreach ($eventosSistemas as $evento): ?>
            <div class="col-6 col-md-3">
                <div class="card text-center p-2 h-100">
                    <strong class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></strong>
                    <img src="img/<?= htmlspecialchars($evento['imagem']) ?>" class="img-fluid my-2"
                        alt="Imagem do evento">
                    <small>
                        <?= htmlspecialchars($evento['data_evento']) ?><br>
                        <?= htmlspecialchars($evento['local']) ?><br>
                        <b><?= htmlspecialchars($evento['descricao']) ?></b>
                    </small>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Direito -->
    <div class="container">
        <h5 class="fw-bold my-4">Direito</h5>
        <div class="row g-3">
            <?php foreach ($eventosDireito as $evento): ?>
            <div class="col-6 col-md-3">
                <div class="card text-center p-2 h-100">
                    <strong class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></strong>
                    <img src="img/<?= htmlspecialchars($evento['imagem']) ?>" class="img-fluid my-2"
                        alt="Imagem do evento">
                    <small>
                        <?= htmlspecialchars($evento['data_evento']) ?><br>
                        <?= htmlspecialchars($evento['local']) ?><br>
                        <b><?= htmlspecialchars($evento['descricao']) ?></b>
                    </small>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>