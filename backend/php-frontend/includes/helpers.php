<?php
function renderEventosPorArea($titulo, $eventos)
{
    echo "<div class='container'>";
    echo "<h5 class='fw-bold my-4'>" . htmlspecialchars($titulo) . "</h5>";
    echo "<div class='row g-3'>";

    foreach ($eventos as $evento) {
        $id = htmlspecialchars($evento['id'] ?? '');
        $tituloEvento = htmlspecialchars($evento['titulo'] ?? 'Evento sem título');
        $imagem = htmlspecialchars($evento['imagem'] ?? 'default.jpg'); // Imagem padrão
        $data = htmlspecialchars($evento['data_evento'] ?? $evento['data'] ?? 'Data não definida'); // Tenta ambos os nomes
        $local = htmlspecialchars($evento['local'] ?? 'Local não definido');
        $descricao = htmlspecialchars(substr($evento['descricao'] ?? 'Descrição não disponível', 0, 50));

        echo <<<HTML
        <div class="col-6 col-md-3">
            <a href="pages/eventos_detalhe.php?id={$id}" class="text-decoration-none text-dark">
                <div class="card text-center p-2 h-100">
                    <strong class="text-primary">{$tituloEvento}</strong>
                    <img src="img/{$imagem}" class="img-fluid my-2" alt="Imagem do evento {$tituloEvento}">
                    <small>
                        {$data}<br>
                        {$local}<br>
                        <b>{$descricao}...</b>
                    </small>
                </div>
            </a>
        </div>
HTML;
    }

    echo "</div></div>";
}