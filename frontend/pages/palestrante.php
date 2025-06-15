// FUTURO
<?php
$pageTitle = "Palestrantes";
require_once '../includes/header.php';

// Simulação de dados (futuramente pode vir do banco)
$palestrantes = [
    [
        'nome' => 'Prof. João da Silva',
        'imagem' => 'joao.jpg',
        'descricao' => 'Especialista em Metodologias Ativas de Ensino. Atua há mais de 10 anos na área da Educação.',
        'area' => 'Pedagogia'
    ],
    [
        'nome' => 'Dra. Ana Ribeiro',
        'imagem' => 'ana.jpg',
        'descricao' => 'Pós-doutora em Direito Constitucional. Autora de livros e palestrante internacional.',
        'area' => 'Direito'
    ],
    [
        'nome' => 'Eng. Lucas Monteiro',
        'imagem' => 'lucas.jpg',
        'descricao' => 'Desenvolvedor full-stack com experiência em startups e sistemas web de alta escalabilidade.',
        'area' => 'Sistemas para Internet'
    ],
];
?>

<div class="container my-5">
    <h1 class="mb-4 text-center"><i class="fas fa-microphone-alt me-2"></i>Palestrantes</h1>

    <div class="row g-4">
        <?php foreach ($palestrantes as $palestrante): ?>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card h-100 text-center shadow-sm">
                <img src="../img/<?= htmlspecialchars($palestrante['imagem']) ?>" class="card-img-top"
                    alt="Foto de <?= htmlspecialchars($palestrante['nome']) ?>">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?= htmlspecialchars($palestrante['nome']) ?></h5>
                    <p class="card-text"><strong>Área:</strong> <?= htmlspecialchars($palestrante['area']) ?></p>
                    <p class="card-text"><?= htmlspecialchars($palestrante['descricao']) ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>