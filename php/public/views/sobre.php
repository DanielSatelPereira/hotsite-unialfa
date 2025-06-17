<?php
$pageTitle = "Sobre o Projeto - αEventos";
include '../includes/header.php';
?>

<main class="about-container">
    <div class="container py-5">

        <!-- Cabeçalho -->
        <section class="mb-5">
            <h1 class="mb-3 text-primary"><i class="fas fa-lightbulb me-2"></i> Sobre o Projeto</h1>
            <p class="lead">O αEventos é um sistema acadêmico desenvolvido durante o <strong>Hackathon UniALFA
                    2025</strong>, por alunos para alunos.</p>
            <p>Nosso objetivo foi criar um portal moderno e intuitivo para divulgação e gerenciamento de eventos
                acadêmicos.</p>
        </section>

        <!-- Objetivo -->
        <section class="mb-5">
            <h2 class="h4 mb-3"><i class="fas fa-bullseye me-2 text-warning"></i> Objetivo do Sistema</h2>
            <ul>
                <li>Divulgar eventos por área de conhecimento</li>
                <li>Facilitar o processo de inscrição</li>
                <li>Integrar diferentes tecnologias aprendidas em sala</li>
                <li>Praticar o uso de APIs, programação orientada a objetos e front-end com UX</li>
            </ul>
        </section>

        <!-- Equipe -->
        <section class="mb-5">
            <h2 class="h4 mb-3"><i class="fas fa-users me-2 text-warning"></i> Nossa Equipe</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <h5>Daniel</h5>
                    <p class="text-muted">Frontend, UX e PHP</p>
                </div>
                <div class="col-md-4">
                    <h5>Gabriela</h5>
                    <p class="text-muted">API com Node.js e integração</p>
                </div>
                <div class="col-md-4">
                    <h5>Alexandre, Leonardo e Jhonnatan</h5>
                    <p class="text-muted">Aplicação Java para Backoffice</p>
                </div>
            </div>
        </section>

        <!-- Tecnologias -->
        <section class="mb-5">
            <h2 class="h4 mb-3"><i class="fas fa-layer-group me-2 text-warning"></i> Tecnologias Utilizadas</h2>
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-desktop me-2"></i> Frontend (PHP)</h5>
                    <ul>
                        <li>PHP puro com POO básica</li>
                        <li>Bootstrap 5</li>
                        <li>Font Awesome</li>
                        <li>JavaScript simples</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><i class="fas fa-server me-2"></i> Backend (API)</h5>
                    <ul>
                        <li>Node.js com Express</li>
                        <li>Knex.js (MySQL)</li>
                        <li>API RESTful</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><i class="fab fa-java me-2"></i> Sistema Java</h5>
                    <ul>
                        <li>CRUD de usuários</li>
                        <li>Gestão administrativa</li>
                        <li>Conexão com o mesmo banco</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><i class="fas fa-database me-2"></i> Banco de Dados</h5>
                    <ul>
                        <li>MySQL</li>
                        <li>Estrutura relacional com chaves estrangeiras</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Roadmap -->
        <section>
            <h2 class="h4 mb-3"><i class="fas fa-road me-2 text-warning"></i> Próximas Etapas</h2>
            <ul>
                <li>Finalizar a API Node.js</li>
                <li>Concluir o sistema de inscrições via frontend</li>
                <li>Integrar o painel administrativo em Java</li>
                <li>Se possível, gerar certificados automatizados</li>
            </ul>
        </section>

    </div>
</main>

<?php
include '../includes/footer.php';
?>