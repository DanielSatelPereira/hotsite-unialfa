<?php
$pageTitle = 'Eventos - αEventos';
include '../includes/header.php';
?>

<div class="container py-4">
    <!-- Título e Mensagens -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Eventos Disponíveis</h2>
    </div>

    <!-- Lista de Eventos -->
    <div class="row g-4">
        <!-- Evento 1 -->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <!-- Imagem -->
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="/assets/img/eventos/workshop.jpg" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Workshop de Inovação Educacional">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-truncate">Workshop de Inovação Educacional</h5>

                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> 15/06/2025
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> 14:00
                        </span>
                    </div>

                    <p class="card-text text-muted small">
                        Workshop sobre metodologias ativas e inovação em educação...
                    </p>
                </div>

                <div class="card-footer bg-white border-0">
                    <a href="/views/eventos/detalhe.php?id=1" class="btn btn-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Detalhes
                    </a>
                </div>
            </div>
        </div>

        <!-- Evento 2 -->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <!-- Imagem -->
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="/assets/img/eventos/maratona.jpg" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Maratona de Programação">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-truncate">Maratona de Programação</h5>

                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> 25/06/2025
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> 09:00
                        </span>
                    </div>

                    <p class="card-text text-muted small">
                        Competição de programação para alunos de sistemas...
                    </p>
                </div>

                <div class="card-footer bg-white border-0">
                    <a href="/views/eventos/detalhe.php?id=2" class="btn btn-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Detalhes
                    </a>
                </div>
            </div>
        </div>

        <!-- Evento 3 -->
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm">
                <!-- Imagem -->
                <div class="card-img-top-container" style="height: 180px; overflow: hidden;">
                    <img src="/assets/img/eventos/direito-digital.jpg" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Direito Digital">
                </div>

                <div class="card-body">
                    <h5 class="card-title text-truncate">Direito Digital</h5>

                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> 22/06/2025
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> 10:00
                        </span>
                    </div>

                    <p class="card-text text-muted small">
                        Aspectos jurídicos na era digital...
                    </p>
                </div>

                <div class="card-footer bg-white border-0">
                    <a href="/views/eventos/detalhe.php?id=3" class="btn btn-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Detalhes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>