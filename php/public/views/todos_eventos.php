<?php
$pageTitle = 'Todos os Eventos - αEventos';
include '../includes/header.php';
?>

<div class="container py-5">
    <h2 class="mb-4 text-primary">Todos os Eventos</h2>

    <div class="row g-4">

        <!-- Evento 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="../assets/img/eventos/workshop.jpg" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Workshop de Inovação Educacional">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-truncate">Workshop de Inovação Educacional</h5>
                    <p class="card-text text-muted small">15/06/2025 às 14:00</p>
                    <a href="detalhes.php?id=1" class="btn text-white" style="background-color: #0511F2;">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>

        <!-- Evento 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="../assets/img/eventos/maratona.jpg" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Maratona de Programação">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-truncate">Maratona de Programação</h5>
                    <p class="card-text text-muted small">25/06/2025 às 09:00</p>
                    <a href="detalhes.php?id=2" class="btn text-white" style="background-color: #0511F2;">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>

        <!-- Evento 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="../assets/img/eventos/direito-digital.jpg" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Direito Digital">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-truncate">Direito Digital</h5>
                    <p class="card-text text-muted small">22/06/2025 às 10:00</p>
                    <a href="detalhes.php?id=3" class="btn text-white" style="background-color: #0511F2;">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../includes/footer.php'; ?>