<?php

/**
 * Página Sobre o Projeto - αEventos
 * 
 * Apresenta informações sobre o sistema, equipe e tecnologias utilizadas
 */

// 1. Configurações da página
$pageTitle = "Sobre o Projeto | " . SITE_NAME;
require_once __DIR__ . '/../config/config.php';
require_once INCLUDES_DIR . '/header.php';

// 2. Dados da equipe (pode ser movido para um controller no futuro)
$teamMembers = [
    [
        'name' => 'Daniel',
        'role' => 'Frontend, UX e integração PHP',
        'icon' => 'fa-code',
        'color' => 'primary',
        'skills' => ['PHP', 'Bootstrap']
    ],
    [
        'name' => 'Gabriela',
        'role' => 'API Node.js e integração',
        'icon' => 'fa-node-js',
        'color' => 'success',
        'skills' => ['Node.js', 'API']
    ],
    [
        'name' => 'Time Java',
        'role' => 'Alexandre, Leonardo e Jhonnatan',
        'icon' => 'fa-java',
        'color' => 'warning',
        'skills' => ['Java', 'Backoffice']
    ]
];

// 3. Tecnologias utilizadas
$technologies = [
    'Frontend' => ['Bootstrap 5', 'Font Awesome', 'JavaScript'],
    'Backend' => ['PHP OOP', 'Node.js (futuro)', 'Java'],
    'Banco de Dados' => ['MySQL', 'Knex.js (futuro)'],
    'Ferramentas' => ['Git/GitHub', 'XAMPP']
];
?>

<div class="container py-5">
    <!-- Cabeçalho -->
    <section class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">
            <i class="fas fa-lightbulb me-2"></i>Sobre o Projeto
        </h1>
        <p class="lead mt-3">
            Desenvolvido durante o <span class="badge bg-primary">Hackathon UniALFA <?= date('Y') ?></span>
        </p>
        <div class="divider mx-auto bg-primary"></div>
    </section>

    <!-- Seção Objetivo -->
    <section class="card shadow-sm mb-5 border-primary">
        <div class="card-header bg-primary text-white">
            <h2 class="h4 mb-0"><i class="fas fa-bullseye me-2"></i>Objetivo</h2>
        </div>
        <div class="card-body">
            <p class="mb-0">O <?= SITE_SHORT_NAME ?> foi criado para centralizar a divulgação de eventos acadêmicos por
                área de conhecimento, proporcionando:</p>
            <ul class="mt-3">
                <li>Acesso unificado a informações de eventos</li>
                <li>Interface intuitiva para alunos e professores</li>
                <li>Integração com sistemas existentes da UniALFA</li>
                <li>Plataforma escalável para futuras expansões</li>
            </ul>
        </div>
    </section>

    <!-- Seção Equipe -->
    <section class="card shadow-sm mb-5 border-success">
        <div class="card-header bg-success text-white">
            <h2 class="h4 mb-0"><i class="fas fa-users me-2"></i>Nossa Equipe</h2>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($teamMembers as $member): ?>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center py-4">
                            <div class="bg-<?= $member['color'] ?> bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fab <?= $member['icon'] ?> fa-2x text-<?= $member['color'] ?>"></i>
                            </div>
                            <h3 class="h5 card-title"><?= $member['name'] ?></h3>
                            <p class="card-text text-muted small"><?= $member['role'] ?></p>
                            <div class="mt-auto pt-3">
                                <?php foreach ($member['skills'] as $skill): ?>
                                <span class="badge bg-<?= $member['color'] ?> me-1"><?= $skill ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Seção Tecnologias -->
    <section class="card shadow-sm mb-5 border-info">
        <div class="card-header bg-info text-white">
            <h2 class="h4 mb-0"><i class="fas fa-layer-group me-2"></i>Tecnologias Utilizadas</h2>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <?php foreach ($technologies as $category => $items): ?>
                <div class="col-md-6">
                    <div class="tech-category">
                        <h3 class="h5 text-primary">
                            <i class="fas fa-<?= getTechIcon($category) ?> me-2"></i><?= $category ?>
                        </h3>
                        <ul class="list-unstyled ps-4">
                            <?php foreach ($items as $item): ?>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i><?= $item ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Seção Roadmap -->
    <section class="card shadow-sm border-warning">
        <div class="card-header bg-warning text-dark">
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

<?php
// Função auxiliar para ícones (pode ser movida para helpers)
function getTechIcon($category)
{
    $icons = [
        'Frontend' => 'desktop',
        'Backend' => 'server',
        'Banco de Dados' => 'database',
        'Ferramentas' => 'tools'
    ];
    return $icons[$category] ?? 'code';
}

require_once INCLUDES_DIR . '/footer.php';