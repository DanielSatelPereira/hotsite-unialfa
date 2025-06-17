<?php
$pageTitle = "Sobre o Projeto - αEventos";
include '../includes/header.php';
?>

<main class="about-container">
    <div class="container">
        <!-- Cabeçalho -->
        <section class="page-header">
            <h1><i class="fas fa-lightbulb me-2"></i>Sobre o Projeto</h1>
            <p class="lead">Desenvolvido durante o <span class="badge bg-primary">Hackathon UniALFA 2023</span></p>
            <div class="divider"></div>
        </section>

        <!-- Seção Objetivo -->
        <section class="card info-card">
            <div class="card-header">
                <h2 class="h4 mb-0"><i class="fas fa-bullseye me-2"></i>Objetivo</h2>
            </div>
            <div class="card-body">
                <p>O αEventos foi criado para centralizar a divulgação de eventos acadêmicos por área de conhecimento,
                    proporcionando:</p>
                <ul>
                    <li>Acesso unificado a informações de eventos</li>
                    <li>Interface intuitiva para alunos e professores</li>
                    <li>Integração com sistemas existentes da UniALFA</li>
                    <li>Plataforma escalável para futuras expansões</li>
                </ul>
            </div>
        </section>

        <!-- Seção Equipe -->
        <section class="card info-card">
            <div class="card-header">
                <h2 class="h4 mb-0"><i class="fas fa-users me-2"></i>Nossa Equipe</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 team-member">
                        <div class="team-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>Daniel</h3>
                        <p class="text-muted">Frontend, UX e integração PHP</p>
                        <div>
                            <span class="badge bg-primary me-1">PHP</span>
                            <span class="badge bg-primary">Bootstrap</span>
                        </div>
                    </div>

                    <div class="col-md-4 team-member">
                        <div class="team-icon">
                            <i class="fab fa-node-js"></i>
                        </div>
                        <h3>Gabriela</h3>
                        <p class="text-muted">API Node.js e integração</p>
                        <div>
                            <span class="badge bg-success me-1">Node.js</span>
                            <span class="badge bg-success">API</span>
                        </div>
                    </div>

                    <div class="col-md-4 team-member">
                        <div class="team-icon">
                            <i class="fab fa-java"></i>
                        </div>
                        <h3>Time Java</h3>
                        <p class="text-muted">Alexandre, Leonardo e Jhonnatan</p>
                        <div>
                            <span class="badge bg-warning me-1">Java</span>
                            <span class="badge bg-warning">Backoffice</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Seção Tecnologias -->
        <section class="card info-card">
            <div class="card-header">
                <h2 class="h4 mb-0"><i class="fas fa-layer-group me-2"></i>Tecnologias Utilizadas</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 tech-category">
                        <h3><i class="fas fa-desktop me-2"></i>Frontend</h3>
                        <ul>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Bootstrap 5</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Font Awesome</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>JavaScript</li>
                        </ul>
                    </div>

                    <div class="col-md-6 tech-category">
                        <h3><i class="fas fa-server me-2"></i>Backend</h3>
                        <ul>
                            <li><i class="fas fa-check-circle text-success me-2"></i>PHP OOP</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Node.js (futuro)</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Java</li>
                        </ul>
                    </div>

                    <div class="col-md-6 tech-category">
                        <h3><i class="fas fa-database me-2"></i>Banco de Dados</h3>
                        <ul>
                            <li><i class="fas fa-check-circle text-success me-2"></i>MySQL</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Knex.js (futuro)</li>
                        </ul>
                    </div>

                    <div class="col-md-6 tech-category">
                        <h3><i class="fas fa-tools me-2"></i>Ferramentas</h3>
                        <ul>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Git/GitHub</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>XAMPP</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Seção Roadmap -->
        <section class="card info-card">
            <div class="card-header">
                <h2 class="h4 mb-0"><i class="fas fa-road me-2"></i>Próximas Etapas</h2>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-badge bg-warning">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="h6">Integração com API Node.js</h3>
                            <p>Conclusão da integração entre frontend PHP e backend Node.js</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-badge bg-primary">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="h6">Painel Administrativo</h3>
                            <p>Desenvolvimento do backoffice para gestão de eventos</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-badge bg-success">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="h6">Sistema de Inscrições</h3>
                            <p>Implementação completa do fluxo de inscrição em eventos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
include '../includes/footer.php';
?>