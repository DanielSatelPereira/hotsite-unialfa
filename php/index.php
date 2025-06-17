<?php
$pageTitle = "Início - αEventos";
include './public/includes/header.php';
?>

<!-- Carrossel -->
<div id="carouselEventos" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./public/assets/img/cteste_1.jpg" class="d-block w-100" alt="Banner do Evento 1">
        </div>
        <div class="carousel-item">
            <img src="./public/assets/img/cteste_2.jpg" class="d-block w-100" alt="Banner do Evento 2">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEventos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselEventos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Seção de Eventos por Área -->
<div class="container py-5">
    <h3 class="mb-4 text-primary">Eventos por área</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

        <!-- Pedagogia -->
        <div class="col">
            <a href="./public/views/eventos.php?area=Pedagogia" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2" style="color: #FFA500;"></i>
                        <p class="card-text fw-bold">Pedagogia</p>
                        <small class="text-muted">5 eventos</small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sistemas -->
        <div class="col">
            <a href="./public/views/eventos.php?area=Sistemas" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-2x mb-2" style="color: #FFA500;"></i>
                        <p class="card-text fw-bold">Sistemas</p>
                        <small class="text-muted">3 eventos</small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Direito -->
        <div class="col">
            <a href="./public/views/eventos.php?area=Direito" class="text-decoration-none text-dark">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-balance-scale fa-2x mb-2" style="color: #FFA500;"></i>
                        <p class="card-text fw-bold">Direito</p>
                        <small class="text-muted">7 eventos</small>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<?php
include './public/includes/footer.php';
?>