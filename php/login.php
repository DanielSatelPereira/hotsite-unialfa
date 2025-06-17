<?php

$pageTitle = "Login - αEventos";

include './public/includes/header.php';
?>

<!-- Conteúdo principal da página -->

<main class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card login-card">
                    <div class="card-header login-header text-white">
                        <h3><i class="fas fa-user-graduate me-2"></i>Acesso Acadêmico</h3>
                    </div>
                    <div class="card-body login-body">
                        <!-- Mensagem de erro -->
                        <div class="alert alert-danger login-alert alert-dismissible fade show d-none">
                            Mensagem de erro aqui
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <form method="POST" class="needs-validation" novalidate>
                            <!-- Campos do formulário (mantidos iguais) -->
                            <div class="login-input-group">
                                <label for="email" class="form-label">E-mail Institucional</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="seu.email@unialfa.edu.br" required>
                                    <div class="invalid-feedback">
                                        Por favor, insira um e-mail válido.
                                    </div>
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
                                    <div class="invalid-feedback">
                                        Por favor, insira sua senha.
                                    </div>
                                </div>
                            </div>

                            <!-- Grupo de botões atualizado -->
                            <div class="button-group mt-4">
                                <button type="submit" class="btn btn-confirm btn-lg py-2">
                                    <i class="fas fa-sign-in-alt me-2"></i>Confirmar Acesso
                                </button>

                                <a href="cadastro.php" class="btn btn-register btn-lg py-2">
                                    <i class="fas fa-user-plus me-2"></i>Criar Nova Conta
                                </a>
                            </div>

                            <div class="login-links">
                                <p class="mt-3 mb-1">Problemas para acessar? <a href="suporte.php">Contate o suporte</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts (mantidos iguais) -->
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
include './public/includes/footer.php';
?>