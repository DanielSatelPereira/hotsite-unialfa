<?php
// Reutilizando o mesmo pathPrefix definido no header
if (!isset($pathPrefix)) {
    $pathPrefix = file_exists('./assets/css/style.css') ? './' : '../';
}
?>
<footer class="pt-4 pb-2 mt-5 text-white" style="background-color: #0511F2;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <img src="<?= $pathPrefix ?>assets/img/unialfa-logo-navbar.png" alt="UniALFA" class="img-fluid mb-3">
                <p class="small">Promovendo educação de qualidade desde 1992. Transformando vidas através do
                    conhecimento.</p>
            </div>

            <div class="col-lg-2 col-md-4">
                <h5 class="text-uppercase mb-3" style="color: #FFA500;">Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?= $pathPrefix ?>public/views/institucional.php"
                            class="text-white text-decoration-none">Institucional</a></li>
                    <li class="mb-2"><a href="<?= $pathPrefix ?>public/views/sobre.php"
                            class="text-white text-decoration-none">Sobre</a></li>
                    <li class="mb-2"><a href="<?= $pathPrefix ?>public/views/todos_eventos.php"
                            class="text-white text-decoration-none">Eventos</a></li>
                    <li class="mb-2"><a href="<?= $pathPrefix ?>public/views/contato.php"
                            class="text-white text-decoration-none">Contato</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <h5 class="text-uppercase mb-3" style="color: #FFA500;">Contato</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt text-light me-2"></i> Av. Brasil, 500 - Umuarama -
                        PR</li>
                    <li class="mb-2"><i class="fas fa-phone-alt text-light me-2"></i> (44) 3621-4000</li>
                    <li><i class="fas fa-envelope text-light me-2"></i> <a href="mailto:eventos@unialfa.com.br"
                            class="text-white text-decoration-none">eventos@unialfa.com.br</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <h5 class="text-uppercase mb-3" style="color: #FFA500;">Redes Sociais</h5>
                <div class="d-flex gap-3 mb-3">
                    <a href="#" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white fs-5"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-white fs-5"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <a href="https://www.alfaumuarama.edu.br/fau/index.php" target="_blank"
                    class="btn btn-outline-light btn-sm">Site Oficial</a>
            </div>
        </div>

        <hr class="my-4 bg-secondary">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="small mb-0">&copy; 2025 UniALFA - Todos os direitos reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="small mb-0">
                    Desenvolvido por <a href="<?= $pathPrefix ?>public/views/sobre.php"
                        class="text-warning text-decoration-none">Equipe αEventos</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>