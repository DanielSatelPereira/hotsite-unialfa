<?php
$pageTitle = "Institucional";
require_once '../includes/header.php';
?>

<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">
            <i class="fas fa-university text-primary"></i> Sobre a UniALFA
        </h1>
        <p class="text-muted">Conheça a missão do projeto e a instituição por trás dele.</p>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="../img/unialfa.jpg" class="img-fluid rounded shadow" alt="Fachada da UniALFA">
        </div>
        <div class="col-md-6">
            <h3 class="fw-bold text-primary">Nossa Instituição</h3>
            <p>
                A <strong>UniALFA</strong> é uma instituição de ensino superior reconhecida pela qualidade
                de sua formação acadêmica, inovação e compromisso com o desenvolvimento social. Oferece
                cursos que estimulam o pensamento crítico, a criatividade e a resolução de problemas reais.
            </p>
            <p>
                Esse hotsite foi desenvolvido como parte de um <strong>projeto interdisciplinar</strong>, unindo as
                áreas de
                <em>Programação, UX, DevOps e Comunicação</em>, visando aplicar os conhecimentos adquiridos
                em um sistema funcional e acessível para divulgar eventos acadêmicos e institucionais.
            </p>
        </div>
    </div>

    <div class="text-center">
        <h4 class="fw-bold">Missão do Projeto</h4>
        <p class="lead">
            Democratizar o acesso à informação sobre eventos da UniALFA, promovendo integração entre alunos,
            professores e comunidade.
        </p>
    </div>

    <div class="text-center mt-4">
        <a href="<?= $baseurl ?>index.php" class="btn btn-primary">
            <i class="fas fa-arrow-left me-2"></i>Voltar para a Home
        </a>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>