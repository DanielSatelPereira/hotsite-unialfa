<?php
$pageTitle = "Página não encontrada";
require_once '../includes/header.php';
?>

<div class="text-center mt-5 mb-5">
    <h1 class="display-1 fw-bold text-danger">404</h1>
    <h2 class="mb-3">Ops! Página não encontrada</h2>
    <p class="mb-4">A página que você tentou acessar não existe ou foi movida.</p>
    <a href="<?= $baseurl ?>index.php" class="btn btn-primary">
        <i class="fas fa-arrow-left me-2"></i>Voltar para a Home
    </a>
</div>

<?php require_once '../includes/footer.php'; ?>


<!-- Adicionar a seguinte validação para ser redirecionado para esta pagina
 
if (!$evento) 
{
    header("Location: 404.php");
    exit;
}
--!>