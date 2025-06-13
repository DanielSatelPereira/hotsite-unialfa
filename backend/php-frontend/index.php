<?php
$pageTitle = "Início - αEventos";
require_once __DIR__ . '\config\constants.php';
require_once CLASSES_DIR . '/EventoDAO.php';
require_once INCLUDES_DIR . '/header.php';
require_once INCLUDES_DIR . '/helpers.php';

$eventosPedagogia = EventoDAO::listarPorCurso(1, 4); // ID 1 = Pedagogia
$eventosSistemas = EventoDAO::listarPorCurso(2, 4); // ID 2 = Sistemas
$eventosDireito = EventoDAO::listarPorCurso(3, 4);  // ID 3 = Direito
?>

<div id="carouselEventos" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= BASE_URL ?>/frontend/assets/img/cteste_1.jpg" class="d-block w-100" alt="Banner do Evento">
        </div>
        <div class="carousel-item">
            <img src="<?= BASE_URL ?>/frontend/assets/img/cteste_2.jpg" class="d-block w-100" alt="Banner do Evento">
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
            <a href="<?= BASE_URL ?>/frontend/pages/eventos.php?id=1" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2 text-primary"></i>
                        <p class="card-text fw-bold">Pedagogia</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="<?= BASE_URL ?>/frontend/pages/eventos.php?id=2" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-2x mb-2 text-success"></i>
                        <p class="card-text fw-bold">Sistemas</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="<?= BASE_URL ?>/frontend/pages/eventos.php?id=3" class="text-decoration-none text-dark">
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


<?php
renderEventosPorArea('Pedagogia', $eventosPedagogia);
renderEventosPorArea('Sistemas para Internet', $eventosSistemas);
renderEventosPorArea('Direito', $eventosDireito);

include INCLUDES_DIR . '/footer.php';
?>