<footer class="bg-dark text-white pt-4 pb-2 mt-5">
    <div class="container">
        <div class="row">
            <!-- Logo e Descrição -->
            <div class="col-lg-4 mb-4">
                <img src="<?= BASE_URL ?>/frontend/assets/img/unialfa-logo-footer.png" alt="UniALFA"
                    class="img-fluid mb-3" style="max-height: 50px">
                <p class="small">Promovendo educação de qualidade desde 1992. Transformando vidas através do
                    conhecimento e inovação.</p>
            </div>

            <!-- Links Rápidos -->
            <div class="col-lg-2 col-md-4 mb-4">
                <h5 class="text-uppercase text-primary mb-3">Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?= BASE_URL ?>/frontend/pages/institucional.php"
                            class="text-white text-decoration-none">Institucional</a></li>
                    <li class="mb-2"><a href="<?= BASE_URL ?>/frontend/pages/sobre.php"
                            class="text-white text-decoration-none">Sobre o Projeto</a></li>
                    <li class="mb-2"><a href="<?= BASE_URL ?>/frontend/pages/eventos.php"
                            class="text-white text-decoration-none">Eventos</a></li>
                    <li><a href="<?= BASE_URL ?>/frontend/pages/contato.php"
                            class="text-white text-decoration-none">Contato</a></li>
                </ul>
            </div>

            <!-- Contato -->
            <div class="col-lg-3 col-md-4 mb-4">
                <h5 class="text-uppercase text-primary mb-3">Contato</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                        Av. Brasil, 500 - Zona III, Umuarama - PR
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone-alt text-secondary me-2"></i>
                        (44) 3621-4000
                    </li>
                    <li>
                        <i class="fas fa-envelope text-secondary me-2"></i>
                        eventos@unialfa.com.br
                    </li>
                </ul>
            </div>

            <!-- Redes Sociais -->
            <div class="col-lg-3 col-md-4 mb-4">
                <h5 class="text-uppercase text-primary mb-3">Redes Sociais</h5>
                <div class="d-flex gap-3 mb-3">
                    <a href="https://www.facebook.com/unialfaumuarama/" target="_blank" class="text-white fs-5">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/unialfaumuarama/" target="_blank" class="text-white fs-5">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/user/unialfaumuarama" target="_blank" class="text-white fs-5">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.linkedin.com/school/unialfa/" target="_blank" class="text-white fs-5">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <a href="https://www.alfaumuarama.edu.br/fau/index.php" target="_blank"
                    class="btn btn-outline-light btn-sm">
                    Site Oficial
                </a>
            </div>
        </div>

        <hr class="my-4 bg-secondary">

        <!-- Rodapé inferior -->
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="small mb-0">&copy; <?= date('Y') ?> UniALFA - Todos os direitos reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="small mb-0">
                    Desenvolvido por <a href="<?= BASE_URL ?>/frontend/pages/sobre.php"
                        class="text-primary text-decoration-none">Equipe αEventos</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>