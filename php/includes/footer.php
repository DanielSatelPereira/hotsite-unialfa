<?php
// Busca dados dinâmicos do footer
$footerData = ApiHelper::chamarAPI('site/footer');
?>
</main> <!-- Fecha a tag main do header -->

<footer class="bg-dark text-white pt-4 pb-2 mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- Logo e Descrição -->
            <div class="col-lg-4">
                <img src="<?= BASE_URL ?>/frontend/assets/img/unialfa-logo-footer.png"
                    alt="UniALFA"
                    class="img-fluid mb-3"
                    loading="lazy"
                    style="max-height: 50px">
                <p class="small"><?= $footerData['descricao'] ?? 'Promovendo educação de qualidade desde 1992. Transformando vidas através do conhecimento e inovação.' ?></p>
            </div>

            <!-- Links Rápidos -->
            <div class="col-lg-2 col-md-4">
                <h5 class="text-uppercase text-primary mb-3">Links</h5>
                <ul class="list-unstyled">
                    <?php foreach (
                        $footerData['links'] ?? [
                            ['url' => '/frontend/pages/institucional.php', 'texto' => 'Institucional'],
                            ['url' => '/frontend/pages/sobre.php', 'texto' => 'Sobre o Projeto'],
                            ['url' => '/frontend/pages/eventos.php', 'texto' => 'Eventos'],
                            ['url' => '/frontend/pages/contato.php', 'texto' => 'Contato']
                        ] as $link
                    ): ?>
                        <li class="mb-2">
                            <a href="<?= BASE_URL . $link['url'] ?>"
                                class="text-white text-decoration-none hover-primary">
                                <?= htmlspecialchars($link['texto']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contato -->
            <div class="col-lg-3 col-md-4">
                <h5 class="text-uppercase text-primary mb-3">Contato</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                        <?= $footerData['endereco'] ?? 'Av. Brasil, 500 - Zona III, Umuarama - PR' ?>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone-alt text-secondary me-2"></i>
                        <?= $footerData['telefone'] ?? '(44) 3621-4000' ?>
                    </li>
                    <li>
                        <i class="fas fa-envelope text-secondary me-2"></i>
                        <a href="mailto:<?= $footerData['email'] ?? 'eventos@unialfa.com.br' ?>"
                            class="text-white text-decoration-none hover-primary">
                            <?= $footerData['email'] ?? 'eventos@unialfa.com.br' ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Redes Sociais -->
            <div class="col-lg-3 col-md-4">
                <h5 class="text-uppercase text-primary mb-3">Redes Sociais</h5>
                <div class="d-flex gap-3 mb-3">
                    <?php foreach (
                        $footerData['redes_sociais'] ?? [
                            ['url' => 'https://www.facebook.com/unialfaumuarama/', 'icone' => 'facebook-f'],
                            ['url' => 'https://www.instagram.com/unialfaumuarama/', 'icone' => 'instagram'],
                            ['url' => 'https://www.youtube.com/user/unialfaumuarama', 'icone' => 'youtube'],
                            ['url' => 'https://www.linkedin.com/school/unialfa/', 'icone' => 'linkedin-in']
                        ] as $rede
                    ): ?>
                        <a href="<?= $rede['url'] ?>"
                            target="_blank"
                            class="text-white fs-5 hover-primary"
                            aria-label="<?= ucfirst($rede['icone']) ?>">
                            <i class="fab fa-<?= $rede['icone'] ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
                <a href="<?= $footerData['site_url'] ?? 'https://www.alfaumuarama.edu.br/fau/index.php' ?>"
                    target="_blank"
                    class="btn btn-outline-light btn-sm hover-primary">
                    Site Oficial
                </a>
            </div>
        </div>

        <hr class="my-4 bg-secondary">

        <!-- Rodapé inferior -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="small mb-0">
                    &copy; <?= date('Y') ?> <?= $footerData['copyright'] ?? 'UniALFA - Todos os direitos reservados.' ?>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="small mb-0">
                    Desenvolvido por
                    <a href="<?= BASE_URL ?>/frontend/pages/sobre.php"
                        class="text-primary text-decoration-none hover-white">
                        Equipe αEventos
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

<?php if (isset($scripts)): ?>
    <!-- Scripts específicos da página -->
    <?php foreach ($scripts as $script): ?>
        <script src="<?= BASE_URL ?>/frontend/assets/js/<?= $script ?>.js?v=<?= filemtime(BASE_PATH . '/frontend/assets/js/' . $script . '.js') ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>

</html>