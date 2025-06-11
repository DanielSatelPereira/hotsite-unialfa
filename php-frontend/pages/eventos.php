<?php
include 'classes/EventoDAO.php';

$area = $_GET['area'] ?? '';
$eventos = EventoDAO::listarPorArea($area);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Eventos - <?= htmlspecialchars($area) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container py-5">
        <h2 class="mb-4">Eventos de <?= htmlspecialchars($area) ?></h2>

        <div class="row g-3">
            <?php if (count($eventos) > 0): ?>
            <?php foreach ($eventos as $evento): ?>
            <div class="col-6 col-md-3">
                <div class="card text-center p-2">
                    <strong class="text-primary"><?= htmlspecialchars($evento['titulo']) ?></strong>
                    <img src="img/<?= htmlspecialchars($evento['imagem']) ?>" class="img-fluid my-2" alt="Evento">
                    <small>
                        <?= htmlspecialchars($evento['data_evento']) ?><br>
                        <?= htmlspecialchars($evento['local']) ?><br>
                        <b><?= htmlspecialchars($evento['descricao']) ?></b>
                    </small>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>Nenhum evento encontrado para esta área.</p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>