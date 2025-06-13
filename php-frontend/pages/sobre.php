<?php
$pageTitle = "Sobre o Projeto";
require_once '../includes/header.php';
?>

<div class="container">
    <h1 class="mb-4 text-primary fw-bold"><i class="fas fa-users me-2"></i>Sobre o Projeto</h1>

    <section class="mb-5">
        <h2 class="h4 text-secondary">Objetivo do Projeto</h2>
        <p>Este hotsite foi desenvolvido durante o <strong>Hackathon UniALFA 2025</strong> com o objetivo de centralizar
            a divulgação de eventos acadêmicos por área de conhecimento, facilitando o acesso de alunos e professores às
            informações.</p>
    </section>

    <section class="mb-5">
        <h2 class="h4 text-secondary">Sobre a Equipe</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Integrante -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">D.</h5>
                        <p class="card-text">Responsável pelo Frontend, UX e integração PHP. Participante ativo no
                            desenvolvimento do sistema e estrutura de dados.</p>
                    </div>
                </div>
            </div>

            <!-- Replique para os demais -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">J.</h5>
                        <p class="card-text">Atuação em lógica de programação e estruturação do backend com PHP OOP.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">G.</h5>
                        <p class="card-text">Trabalhou na organização da base de dados e testes das funcionalidades.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">A.</h5>
                        <p class="card-text">Ajudou no design da interface e usabilidade, além de atuar no levantamento
                            de requisitos.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">L.</h5>
                        <p class="card-text">Foco em testes, revisão de conteúdo e validação das entregas do grupo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <h2 class="h4 text-secondary">Tecnologias Utilizadas</h2>
        <ul>
            <li>HTML, CSS, Bootstrap e FontAwesome</li>
            <li>PHP com Programação Orientada a Objetos</li>
            <li>MySQL para o armazenamento de dados</li>
            <li>GitHub para versionamento e colaboração</li>
        </ul>
    </section>

    <section>
        <h2 class="h4 text-secondary">Próximos Passos</h2>
        <p>O projeto está estruturado para, futuramente, ser integrado com uma API e receber um painel administrativo
            para cadastro dinâmico de eventos, palestrantes e usuários.</p>
    </section>
</div>

<?php require_once '../includes/footer.php'; ?>