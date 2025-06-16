<?php
// php/index.php

session_start();
$usuarioLogado = isset($_SESSION['usuario']);

// Carrega configurações
require_once __DIR__ . '/config/config.php';

// Título da página
$pageTitle = "Início - αEventos";

// Importações de classes e componentes
require_once CLASSES_DIR . '/EventoDAO.php';
require_once INCLUDES_DIR . '/header.php';
require_once INCLUDES_DIR . '/helpers.php';

// Listagem de eventos por curso (ID do curso, limite de eventos)
$eventosPedagogia = EventoDAO::listarPorCurso(1, 4);
$eventosSistemas  = EventoDAO::listarPorCurso(2, 4);
$eventosDireito   = EventoDAO::listarPorCurso(3, 4);
?>

<!-- Carrossel -->
<div id="carouselEventos" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= IMG_URL ?>/cteste_1.jpg" class="d-block w-100" alt="Banner do Evento">
        </div>
        <div class="carousel-item">
            <img src="<?= IMG_URL ?>/cteste_2.jpg" class="d-block w-100" alt="Banner do Evento">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEventos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselEventos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Cards de Áreas -->
<div class="container py-5">
    <h3 class="mb-4">Eventos por área</h3>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
        <div class="col">
            <a href="<?= BASE_URL ?>/php/views/eventos/listar.php?id=1" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2 text-primary"></i>
                        <p class="card-text fw-bold">Pedagogia</p>
                        <small class="text-muted"><?= count($eventosPedagogia) ?> eventos</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="<?= BASE_URL ?>/php/views/eventos/listar.php?id=2" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-2x mb-2 text-success"></i>
                        <p class="card-text fw-bold">Sistemas</p>
                        <small class="text-muted"><?= count($eventosSistemas) ?> eventos</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="<?= BASE_URL ?>/php/views/eventos/listar.php?id=3" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-balance-scale fa-2x mb-2 text-danger"></i>
                        <p class="card-text fw-bold">Direito</p>
                        <small class="text-muted"><?= count($eventosDireito) ?> eventos</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Listagem dinâmica dos eventos -->
<?php
renderEventosPorArea('Pedagogia', $eventosPedagogia);
renderEventosPorArea('Sistemas para Internet', $eventosSistemas);
renderEventosPorArea('Direito', $eventosDireito);

// Rodapé
require_once INCLUDES_DIR . '/footer.php';
