<?php
session_start();

$pageTitle = "Login - αEventos";
require './api/ApiHelper.php';
include './partials/header.php';

$api = new ApiHelper();
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dadosLogin = [
        'email' => $email,
        'senha' => $senha
    ];

    $resultado = $api->post('session', $dadosLogin);

    if (isset($resultado['message']) && $resultado['message'] === 'Usuário logado!' && isset($resultado['usuario'])) {
        // Login OK → Salvar os dados na sessão
        $_SESSION['usuario_id'] = $resultado['usuario']['id'];
        $_SESSION['usuario_ra'] = $resultado['usuario']['ra'];
        $_SESSION['usuario_nome'] = $resultado['usuario']['nome'];
        $_SESSION['usuario_email'] = $resultado['usuario']['email'];
        $_SESSION['usuario_tipo'] = $resultado['usuario']['tipo'];

        $mensagem = "Login bem-sucedido! Sessão criada.";
        // Aqui você pode redirecionar depois, mas vou deixar só a mensagem pra você testar.
    } else {
        $mensagem = "Falha no login: " . ($resultado['message'] ?? 'Erro inesperado ao autenticar.');
    }
}
?>

<main class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card login-card">
                    <div class="card-header login-header text-white">
                        <h3><i class="fas fa-user-graduate me-2"></i>Acesso Acadêmico</h3>
                    </div>
                    <div class="card-body login-body">

                        <?php if (!empty($mensagem)): ?>
                            <div class="alert alert-info"><?= htmlspecialchars($mensagem) ?></div>
                        <?php endif; ?>

                        <form method="POST" class="needs-validation" novalidate>
                            <div class="login-input-group">
                                <label for="email" class="form-label">E-mail Institucional</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="seu.email@unialfa.edu.br" required>
                                    <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
                                </div>
                            </div>

                            <div class="login-input-group">
                                <label for="senha" class="form-label">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback">Por favor, insira sua senha.</div>
                                </div>
                            </div>

                            <div class="button-group mt-4">
                                <button type="submit" class="btn btn-confirm btn-lg py-2">
                                    <i class="fas fa-sign-in-alt me-2"></i>Confirmar Acesso
                                </button>
                                <a href="cadastro.php" class="btn btn-register btn-lg py-2">
                                    <i class="fas fa-user-plus me-2"></i>Criar Nova Conta
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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

    // Validação do formulário
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
include './partials/footer.php';
?>