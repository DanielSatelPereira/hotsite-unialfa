<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Detalhes - αEventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


</head>

<body>
    <!-- Navbar (simplificada) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-calendar-check me-1 text-primary"></i><strong>α</strong>Eventos
            </a>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-5 border-0">

                    <!-- Imagem do Evento -->
                    <img src="/assets/img/eventos/workshop.jpg" class="card-img-top event-image rounded-top-3"
                        alt="Workshop de Inovação Educacional">

                    <div class="card-body">
                        <!-- Título -->
                        <h1 class="card-title text-primary mb-4">
                            Workshop de Inovação Educacional
                        </h1>

                        <!-- Metadados -->
                        <div class="row mt-4 g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-calendar-alt info-icon me-3"></i>
                                    <div>
                                        <h5 class="mb-0 text-muted small">Data</h5>
                                        <p class="mb-0">15/06/2025</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-clock info-icon me-3"></i>
                                    <div>
                                        <h5 class="mb-0 text-muted small">Hora</h5>
                                        <p class="mb-0">14:00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt info-icon me-3"></i>
                                    <div>
                                        <h5 class="mb-0 text-muted small">Local</h5>
                                        <p class="mb-0">Auditório Central - Campus UniALFA</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-graduation-cap info-icon me-3"></i>
                                    <div>
                                        <h5 class="mb-0 text-muted small">Área</h5>
                                        <p class="mb-0">Pedagogia</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Descrição -->
                        <div class="mt-4">
                            <h4 class="text-primary mb-3">
                                <i class="fas fa-info-circle me-2"></i>Descrição
                            </h4>
                            <div class="card-text">
                                <p>Workshop prático sobre metodologias ativas e inovação em educação. Neste evento,
                                    educadores e pesquisadores compartilharão experiências e técnicas modernas para
                                    transformar a sala de aula.</p>
                                <p>Tópicos abordados:</p>
                                <ul>
                                    <li>Metodologias ativas de aprendizagem</li>
                                    <li>Tecnologia educacional</li>
                                    <li>Design thinking na educação</li>
                                    <li>Avaliação por competências</li>
                                </ul>
                                <p>Duração: 4 horas com certificado de participação.</p>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="d-flex justify-content-between mt-5">
                            <a href="javascript:history.back()" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Voltar
                            </a>
                            <a href="/views/eventos/eventos.php?id=1" class="btn btn-primary">
                                <i class="fas fa-calendar me-2"></i>Mais eventos desta área
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bloco de Inscrição -->
                <div class="card border-0 shadow-sm mb-5">
                    <div class="card-body">
                        <div class="text-center p-4">
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-lock me-2"></i>Acesso Restrito
                            </h5>
                            <p class="mb-4">Para se inscrever neste evento, faça login com seu RA UniALFA</p>
                            <a href="/login.php" class="btn btn-primary px-4">
                                <i class="fas fa-sign-in-alt me-2"></i> Fazer Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer (simplificado) -->
    <footer class="bg-dark text-white pt-4 pb-2 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="small mb-0">
                        &copy; 2023 UniALFA - Todos os direitos reservados.<br>
                        Desenvolvido por <a href="#" class="text-primary text-decoration-none">Equipe αEventos</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>