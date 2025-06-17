<?php
$pageTitle = 'Detalhes do Evento - αEventos';
include '../includes/header.php';
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <!-- Imagem de destaque -->
            <img src="../assets/img/eventos/workshop.jpg" alt="Workshop de Inovação Educacional"
                class="img-fluid rounded mb-4 shadow-sm">

            <!-- Título do Evento -->
            <h2 class="mb-3 text-primary">Workshop de Inovação Educacional</h2>

            <!-- Informações principais -->
            <ul class="list-unstyled mb-4">
                <li><i class="fas fa-calendar-day me-2 text-warning"></i> Data: 15/06/2025</li>
                <li><i class="fas fa-clock me-2 text-warning"></i> Horário: 14:00</li>
                <li><i class="fas fa-map-marker-alt me-2 text-warning"></i> Local: Auditório Principal - UniALFA</li>
            </ul>

            <!-- Descrição -->
            <p>
                Participe deste workshop incrível focado em metodologias ativas e inovação no ensino! Uma ótima
                oportunidade para educadores, alunos e interessados em novas formas de aprendizado.
            </p>

            <!-- Botão de Inscrição -->
            <a href="../inscricoes/inscrever.php?id=1" class="btn text-white" style="background-color: #0511F2;">
                <i class="fas fa-check-circle me-1"></i> Inscrever-se
            </a>
        </div>

        <!-- Informações Extras -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header text-white" style="background-color: #0511F2;">
                    <i class="fas fa-info-circle me-2"></i> Informações Rápidas
                </div>
                <div class="card-body">
                    <p><strong>Vagas:</strong> 50</p>
                    <p><strong>Área:</strong> Pedagogia</p>
                    <p><strong>Palestrante:</strong> Prof. João Silva</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>