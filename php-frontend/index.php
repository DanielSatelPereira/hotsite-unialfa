<?php
include 'classes/EventoDAO.php';
$eventosPedagogia = EventoDAO::listarPorArea('Pedagogia', 4);

$eventosSistemas = EventoDAO::listarPorArea('Sistemas para Internet', 4);
$eventosDireito = EventoDAO::listarPorArea('Direito', 4);
include 'includes/header.php';
include 'includes/helpers.php';
?>

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
            <a href="pages/eventos.php?area=Pedagogia" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2 text-primary"></i>
                        <p class="card-text fw-bold">Pedagogia</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="pages/eventos.php?area=Sistemas%20para%20Internet" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-2x mb-2 text-success"></i>
                        <p class="card-text fw-bold">Sistemas</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="pages/eventos.php?area=Direito" class="text-decoration-none text-dark">
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
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'includes/footer.php'; ?>