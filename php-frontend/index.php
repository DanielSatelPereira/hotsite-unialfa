<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniALFA Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f0f8ff;
    }

    .navbar-brand strong {
        color: #0d6efd;
    }

    .evento-card {
        transition: transform 0.3s ease;
    }

    .evento-card:hover {
        transform: translateY(-5px);
    }

    .evento-info {
        font-size: 0.9rem;
    }

    .titulo-area {
        margin-top: 3rem;
        margin-bottom: 1rem;
        font-weight: bold;
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
        <a class="navbar-brand" href="#"><strong>a</strong>Eventos</a>
        <div class="ms-auto d-flex align-items-center">
            <input class="form-control me-2" type="search" placeholder="Procurar eventos">
            <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
            <a href="#" class="btn btn-dark ms-3">Cadastro / Login</a>
        </div>
    </nav>

    <!-- Carrossel -->
    <div id="carouselEventos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1200x400.png?text=Banner+Vestibular+de+Inverno+UniALFA"
                    class="d-block w-100" alt="Banner do Evento">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselEventos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselEventos" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Eventos por área -->
    <div class="container py-5">
        <h3 class="mb-4">Eventos por área</h3>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-book fa-2x mb-2"></i>
                        <p class="card-text">Título</p>
                    </div>
                </div>
            </div>
            <!-- Repita os cards conforme necessário -->
        </div>

        <!-- Área: Pedagogia -->
        <h5 class="titulo-area">Pedagogia</h5>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
            <div class="col">
                <div class="card evento-card">
                    <div class="card-body">
                        <h6 class="text-primary">Evento</h6>
                        <p class="evento-info">data<br>local<br><small class="text-muted">descrição</small></p>
                    </div>
                </div>
            </div>
            <!-- Repita os cards conforme necessário -->
        </div>

        <!-- Área: Sistemas para Internet -->
        <h5 class="titulo-area">Sistemas para Internet</h5>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
            <div class="col">
                <div class="card evento-card">
                    <div class="card-body">
                        <h6 class="text-primary">Evento</h6>
                        <p class="evento-info">data<br>local<br><small class="text-muted">descrição</small></p>
                    </div>
                </div>
            </div>
            <!-- Repita os cards conforme necessário -->
        </div>

        <!-- Área: Direito -->
        <h5 class="titulo-area">Direito</h5>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
            <div class="col">
                <div class="card evento-card">
                    <div class="card-body">
                        <h6 class="text-primary">Evento</h6>
                        <p class="evento-info">data<br>local<br><small class="text-muted">descrição</small></p>
                    </div>
                </div>
            </div>
            <!-- Repita os cards conforme necessário -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>