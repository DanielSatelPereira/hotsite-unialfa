<?php
// ✅ Mapeia o título do evento para uma imagem fixa da pasta /img/
function getImagemEvento($tituloEvento)
{
    switch (strtolower($tituloEvento)) {
        case 'introdução à didática':
            return 'didatica.jpg';
        case 'direito digital':
            return 'etica.jpg';
        case 'front-end moderno':
            return 'front-end.jpg';
        case 'psicologia da educação':
            return 'didatica.jpg';
        case 'legislação trabalhista':
            return 'etica.jpg';
        case 'desenvolvimento web com php':
            return 'desenvolvimento com php.jpg';
        case 'tecnologia na educação':
            return 'edutec.jpg';
        case 'ética profissional':
            return 'etica.jpg';
        case 'ux e acessibilidade':
            return 'eduinclu.jpg';
        case 'educação inclusiva':
            return 'eduinclu.jpg';
        default:
            return 'default.jpg';
    }
}

// ✅ Renderiza os cards de eventos por área (usado na index.php)
function renderEventosPorArea($titulo, $eventos)
{
    echo "<div class='container py-4'>";
    echo "<h5 class='fw-bold text-primary mb-4'>" . htmlspecialchars($titulo) . "</h5>";
    echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4'>";

    foreach ($eventos as $evento) {
        $id = htmlspecialchars($evento['id']);
        $tituloEvento = htmlspecialchars($evento['titulo']);
        $imagem = getImagemEvento($tituloEvento);
        $data = htmlspecialchars($evento['data']);
        $local = htmlspecialchars($evento['local'] ?? 'Local a definir');
        $descricao = htmlspecialchars($evento['descricao'] ?? '');

        echo <<<HTML
        <div class="col">
            <a href="detalhes.php?id={$id}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <img src="./img/{$imagem}" class="card-img-top object-fit-cover" style="height: 150px;" alt="{$tituloEvento}">
                    <div class="card-body">
                        <h6 class="card-title text-primary fw-bold text-truncate">{$tituloEvento}</h6>
                        <p class="card-text small text-muted mb-1"><i class="fas fa-calendar-day me-1"></i> {$data}</p>
                        <p class="card-text small text-muted"><i class="fas fa-map-marker-alt me-1"></i> {$local}</p>
                        <p class="card-text small text-muted">{$descricao}</p>
                    </div>
                </div>
            </a>
        </div>
HTML;
    }

    echo "</div></div>";
}
