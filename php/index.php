<?php
session_start();

$pageTitle = "Início - αEventos";
require './api/ApiHelper.php';
require './partials/helpers.php';
include './partials/header.php';

$api = new ApiHelper();

// Exibir mensagem de sucesso (exemplo: depois da inscrição)
if (isset($_SESSION['mensagem_sucesso'])) {
    echo '<div class="alert alert-success text-center">' . htmlspecialchars($_SESSION['mensagem_sucesso']) . '</div>';
    unset($_SESSION['mensagem_sucesso']);
}

// Buscar os eventos por área
$pedagogia = $api->get('eventos/area/' . urlencode('Pedagogia'));
$sistemas = $api->get('eventos/area/' . urlencode('Sistemas'));
$direito = $api->get('eventos/area/' . urlencode('Direito'));

?>

<!-- Carrossel -->
<div id="carouselEventos" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/cteste_1.jpg" class="d-block w-100" alt="Banner do Evento 1">
        </div>
        <div class="carousel-item">
            <img src="./img/cteste_2.jpg" class="d-block w-100" alt="Banner do Evento 2">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEventos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselEventos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Eventos por Área -->
<?php
if ($pedagogia && is_array($pedagogia)) {
    renderEventosPorArea('Eventos de Pedagogia', $pedagogia);
}

if ($sistemas && is_array($sistemas)) {
    renderEventosPorArea('Eventos de Sistemas para Internet', $sistemas);
}

if ($direito && is_array($direito)) {
    renderEventosPorArea('Eventos de Direito', $direito);
}
?>

<?php
include './partials/footer.php';
?>