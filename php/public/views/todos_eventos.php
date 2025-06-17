<?php
$pageTitle = "Todos os Eventos - αEventos";
require '/../includes/header.php';
?>

<div class="container my-4">
    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-calendar-alt me-2"></i>Todos os Eventos</h1>
        <span class="badge bg-primary">12 eventos</span>
    </div>

    <!-- Filtros -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="q" class="form-control" placeholder="Buscar eventos...">
                </div>
                <div class="col-md-4">
                    <select name="curso" class="form-select">
                        <option value="">Todos os cursos</option>
                        <option value="1">Pedagogia</option>
                        <option value="2">Sistemas para Internet</option>
                        <option value="3">Direito</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-1"></i> Filtrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Listagem de Eventos -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Evento 1 -->
        <div class="col">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="/assets/img/eventos/workshop.jpg" class="card-img-top" alt="Workshop de Inovação Educacional"
                    style="height: 160px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Workshop de Inovação Educacional</h5>
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> 15/06/2025
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> 14:00
                        </span>
                    </div>
                    <p class="card-text">Workshop sobre metodologias ativas e inovação em educação...</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/views/eventos/detalhe.php?id=1" class="btn btn-outline-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>

        <!-- Evento 2 -->
        <div class="col">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="/assets/img/eventos/maratona.jpg" class="card-img-top" alt="Maratona de Programação"
                    style="height: 160px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Maratona de Programação</h5>
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> 25/06/2025
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> 09:00
                        </span>
                    </div>
                    <p class="card-text">Competição de programação para alunos de sistemas...</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/views/eventos/detalhe.php?id=2" class="btn btn-outline-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>

        <!-- Evento 3 -->
        <div class="col">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="/assets/img/eventos/direito-digital.jpg" class="card-img-top" alt="Direito Digital"
                    style="height: 160px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Direito Digital</h5>
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-primary">
                            <i class="fas fa-calendar-day me-1"></i> 22/06/2025
                        </span>
                        <span class="badge bg-secondary">
                            <i class="fas fa-clock me-1"></i> 10:00
                        </span>
                    </div>
                    <p class="card-text">Aspectos jurídicos na era digital...</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/views/eventos/detalhe.php?id=3" class="btn btn-outline-primary w-100">
                        <i class="fas fa-info-circle me-1"></i> Ver Detalhes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>