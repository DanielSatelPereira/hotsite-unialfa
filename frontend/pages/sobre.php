<?php
$pageTitle = "Sobre o Projeto - αEventos";
require_once __DIR__ . '/../../backend/php-frontend/config/constants.php';
require_once __DIR__ . '/../../backend/php-frontend/includes/header.php';
?>

<div class="container py-5">
    <!-- Cabeçalho -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary fw-bold"><i class="fas fa-lightbulb me-2"></i>Sobre o Projeto</h1>
        <p class="lead">Desenvolvido durante o <span class="badge bg-primary">Hackathon UniALFA 2025</span></p>
    </div>

    <!-- Seção Objetivo -->
    <section class="card shadow-sm mb-5 border-primary">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0"><i class="fas fa-bullseye me-2"></i>Objetivo</h2>
        </div>
        <div class="card-body">
            <p class="mb-0">Centralizar a divulgação de eventos acadêmicos por área de conhecimento, facilitando o
                acesso de alunos e professores às informações através de uma plataforma unificada e intuitiva.</p>
        </div>
    </section>

    <!-- Seção Equipe -->
    <section class="card shadow-sm mb-5 border-success">
        <div class="card-header bg-success text-white">
            <h2 class="h4 mb-0"><i class="fas fa-users me-2"></i>Nossa Equipe</h2>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Daniel - PHP -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-code fa-2x text-primary"></i>
                            </div>
                            <h5 class="card-title">Daniel</h5>
                            <p class="card-text text-muted small">Frontend, UX e integração PHP</p>
                            <div class="mt-auto">
                                <span class="badge bg-primary">PHP</span>
                                <span class="badge bg-secondary">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gaby - Node -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fab fa-node-js fa-2x text-success"></i>
                            </div>
                            <h5 class="card-title">Gabriela</h5>
                            <p class="card-text text-muted small">API Node.js e integração</p>
                            <div class="mt-auto">
                                <span class="badge bg-success">Node.js</span>
                                <span class="badge bg-info">API</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Time Java -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fab fa-java fa-2x text-warning"></i>
                            </div>
                            <h5 class="card-title">Time Java</h5>
                            <p class="card-text text-muted small">Alexandre, Leonardo e Jhonnatan</p>
                            <div class="mt-auto">
                                <span class="badge bg-warning text-dark">Java</span>
                                <span class="badge bg-dark">Backoffice</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Tecnologias -->
    <section class="card shadow-sm mb-5 border-info">
        <div class="card-header bg-info text-white">
            <h2 class="h4 mb-0"><i class="fas fa-layer-group me-2"></i>Tecnologias Utilizadas</h2>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <h5 class="text-primary"><i class="fas fa-desktop me-2"></i>Frontend</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success me-2"></i> Bootstrap 5</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Font Awesome</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> JavaScript</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary"><i class="fas fa-server me-2"></i>Backend</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success me-2"></i> PHP OOP</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Node.js (futuro)</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Java</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary"><i class="fas fa-database me-2"></i>Banco de Dados</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success me-2"></i> MySQL</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Knex.js (futuro)</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary"><i class="fas fa-code-branch me-2"></i>Ferramentas</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success me-2"></i> Git/GitHub</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> XAMPP</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Próximos Passos -->
    <section class="card shadow-sm border-warning">
        <div class="card-header bg-warning text-dark">
            <h2 class="h4 mb-0"><i class="fas fa-road me-2"></i>Próximos Passos</h2>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-rocket text-warning fa-2x me-3"></i>
                </div>
                <div>
                    <p class="mb-0">Integração com API Node.js, desenvolvimento de painel administrativo e implementação
                        de sistema dinâmico para cadastro de eventos, palestrantes e usuários.</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once __DIR__ . '/../../backend/php-frontend/includes/footer.php'; ?>