<?php
$pageTitle = "Institucional - UniALFA | αEventos";
include '../includes/header.php';
?>

<div class="container py-5">
    <!-- Cabeçalho -->
    <div class="text-center mb-5">
        <img src="../assets/img/unialfa-logo.png" alt="Logo UniALFA" class="img-fluid mb-4" style="max-height: 80px">
        <h1 class="display-5 fw-bold text-primary">
            <i class="fas fa-university me-2"></i> Sobre a UniALFA
        </h1>
        <p class="lead">Mais de 30 anos transformando vidas pela educação</p>
    </div>

    <!-- Seção História -->
    <div class="card shadow-sm mb-5 border-primary">
        <div class="card-header text-white" style="background-color: #0511F2;">
            <h2 class="h4 mb-0"><i class="fas fa-landmark me-2"></i> Nossa História</h2>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="../assets/img/unialfa-campus.jpg" class="img-fluid rounded shadow" alt="Campus UniALFA"
                        loading="lazy">
                </div>
                <div class="col-lg-6">
                    <p class="mb-4">
                        Fundada em 1992, a UniALFA (Centro Universitário UniAlfa) se consolidou como uma das principais
                        instituições de ensino superior do Paraná, com unidades em Umuarama e região.
                    </p>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 text-primary">
                            <i class="fas fa-graduation-cap fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-1">Missão</h5>
                            <p class="mb-0">Promover educação de excelência formando cidadãos críticos e profissionais
                                qualificados.</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-shrink-0 text-primary">
                            <i class="fas fa-star fa-2x"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-1">Diferenciais</h5>
                            <ul class="mb-0">
                                <li>Infraestrutura moderna</li>
                                <li>Corpo docente qualificado</li>
                                <li>Projetos interdisciplinares</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção Projeto αEventos -->
    <div class="card shadow-sm mb-5 border-success">
        <div class="card-header bg-success text-white">
            <h2 class="h4 mb-0"><i class="fas fa-lightbulb me-2"></i> O Projeto αEventos</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-success"><i class="fas fa-bullseye me-2"></i> Objetivo</h5>
                    <p>Centralizar a divulgação de eventos acadêmicos, promovendo integração entre alunos, professores e
                        a comunidade através de uma plataforma unificada.</p>

                    <h5 class="text-success mt-4"><i class="fas fa-users me-2"></i> Público</h5>
                    <ul>
                        <li>Alunos de graduação e pós-graduação</li>
                        <li>Corpo docente e pesquisadores</li>
                        <li>Comunidade acadêmica em geral</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="text-success"><i class="fas fa-cogs me-2"></i> Tecnologia</h5>
                    <p>Desenvolvido durante o Hackathon UniALFA 2025, utilizando:</p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary">PHP</span>
                        <span class="badge bg-secondary">Bootstrap</span>
                        <span class="badge bg-success">Node.js</span>
                        <span class="badge bg-warning text-dark">Java</span>
                        <span class="badge bg-info">MySQL</span>
                        <span class="badge bg-dark">TypeScript</span>
                    </div>

                    <div class="mt-4">
                        <a href="sobre.php" class="btn btn-outline-success">
                            <i class="fas fa-users me-2"></i> Conheça a equipe
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção Links Externos -->
    <div class="text-center">
        <h4 class="mb-4">Conheça mais sobre a UniALFA</h4>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="https://www.alfaumuarama.edu.br/fau/index.php" target="_blank" class="btn text-white"
                style="background-color: #0511F2;">
                <i class="fas fa-globe me-2"></i> Site Oficial
            </a>
            <a href="https://www.instagram.com/unialfaumuarama/" target="_blank" class="btn text-white"
                style="background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);">
                <i class="fab fa-instagram me-2"></i> Instagram
            </a>
            <a href="https://www.facebook.com/unialfaumuarama/" target="_blank" class="btn text-white"
                style="background-color: #1877f2;">
                <i class="fab fa-facebook-f me-2"></i> Facebook
            </a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>