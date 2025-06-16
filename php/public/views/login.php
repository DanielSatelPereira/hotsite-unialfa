<?php
require_once __DIR__ . '/../../backend/php-frontend/config/constants.php';
require_once __DIR__ . '/../../backend/php-frontend/classes/UsuarioDAO.php';

// Inicia a sessão no início do script
session_start();

// Modo de operação
$modoAPI = false; // Alterar para true quando o Node.js estiver pronto

// Verifica se já está logado
if (isset($_SESSION['usuario'])) {
    $redirect = $_GET['redirect'] ?? BASE_URL . '/frontend/pages/';
    header("Location: $redirect");
    exit;
}

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    // Validação básica
    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos";
    } else {
        if ($modoAPI) {
            // FUTURO: Chamada à API Node.js
            // $usuario = file_get_contents(NODE_API_URL . '/auth/login');
        } else {
            $usuario = UsuarioDAO::autenticar($email, $senha);
        }

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['api_mode'] = $modoAPI;

            // Redirecionamento seguro
            $redirect = filter_input(INPUT_GET, 'redirect', FILTER_SANITIZE_URL);
            $redirect = $redirect ?: BASE_URL . '/frontend/pages/';

            // Verifica se a URL de redirecionamento é interna
            if (strpos($redirect, BASE_URL) === 0 || strpos($redirect, '/frontend/pages/') === 0) {
                header("Location: $redirect");
            } else {
                header("Location: " . BASE_URL . '/frontend/pages/');
            }
            exit;
        } else {
            $erro = "Credenciais inválidas! Por favor, tente novamente.";
        }
    }
}

// Cabeçalho
$pageTitle = "Login - αEventos";
require_once __DIR__ . '/../../backend/php-frontend/includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-user-graduate me-2"></i>Acesso Acadêmico</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($erro)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= htmlspecialchars($erro) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>

                    <form method="POST" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="email" class="form-label">E-mail Institucional</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="seu.email@unialfa.edu.br" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="senha" class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Entrar
                            </button>
                        </div>

                        <div class="text-center small">
                            <p>Problemas para acessar? <a href="#">Contate o suporte</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Mostrar/esconder senha
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        const icon = this.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
});

// Validação do formulário no frontend
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>

<?php
require_once __DIR__ . '/../../backend/php-frontend/includes/footer.php';
?>