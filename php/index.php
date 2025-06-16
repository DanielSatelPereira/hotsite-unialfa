<?php
// php/index.php

// 1. Configuração inicial
session_start();

// 2. Inclui o ApiHelper primeiro
require './api/ApiHelper.php';

// 3. Agora pode usar a classe
//$eventos = ApiHelper::chamarAPI('eventos/curso/1?limite=4');

// Título da página
$pageTitle = "Início - αEventos";

// Importações diretas (caminhos relativos)
require './api/ApiHelper.php';
require './public/includes/header.php';
require '../includes/helpers.php';

// Requisição dos eventos
//$eventosPedagogia = ApiHelper::chamarAPI('eventos/curso/1?limite=4');
//$eventosSistemas = ApiHelper::chamarAPI('eventos/curso/2?limite=4');
//$eventosDireito = ApiHelper::chamarAPI('eventos/curso/3?limite=4');
?>

<!-- Carrossel -->
<div id="carouselEventos" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/img/cteste_1.jpg" class="d-block w-100" alt="Banner do Evento">
        </div>
        <div class="carousel-item">
            <img src="/assets/img/cteste_2.jpg" class="d-block w-100" alt="Banner do Evento">
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
            <a href="/views/eventos/lista.php?id=1" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2 text-primary"></i>
                        <p class="card-text fw-bold">Pedagogia</p>
                        <small class="text-muted"><?= count($eventosPedagogia['dados'] ?? []) ?> eventos</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/views/eventos/lista.php?id=2" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-2x mb-2 text-success"></i>
                        <p class="card-text fw-bold">Sistemas</p>
                        <small class="text-muted"><?= count($eventosSistemas['dados'] ?? []) ?> eventos</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/views/eventos/lista.php?id=3" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-balance-scale fa-2x mb-2 text-danger"></i>
                        <p class="card-text fw-bold">Direito</p>
                        <small class="text-muted"><?= count($eventosDireito['dados'] ?? []) ?> eventos</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Listagem dinâmica dos eventos -->
<?php
renderEventosPorArea('Pedagogia', $eventosPedagogia['dados'] ?? []);
renderEventosPorArea('Sistemas para Internet', $eventosSistemas['dados'] ?? []);
renderEventosPorArea('Direito', $eventosDireito['dados'] ?? []);

// Rodapé
require './public/includes/footer.php';