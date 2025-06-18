<?php
$pageTitle = "Cadastro - αEventos";
include './partials/header.php';
require './api/ApiHelper.php';

$api = new ApiHelper();
$mensagem = "";

// Quando o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];
    $curso = $_POST['curso'];

    // Validação simples das senhas
    if ($senha !== $confirmarSenha) {
        $mensagem = "As senhas não coincidem!";
    } else {
        // Verificar se o RA existe na tabela usuarios
        $usuarios = $api->get('usuario');

        $raEncontrado = false;
        $usuarioJaCadastrado = false;

        if ($usuarios && is_array($usuarios)) {
            foreach ($usuarios as $usuario) {
                if ($usuario['ra'] == $ra) {
                    $raEncontrado = true;
                    if (!empty($usuario['senha'])) {
                        $usuarioJaCadastrado = true;
                    }
                    break;
                }
            }
        }

        if (!$raEncontrado) {
            $mensagem = "RA não encontrado no sistema. Fale com a coordenação.";
        } elseif ($usuarioJaCadastrado) {
            $mensagem = "Este RA já possui cadastro. Faça login ou recupere sua senha.";
        } else {
            // Faz o cadastro via API (atualiza os dados do usuário no banco)
            $data = [
                'ra' => intval($ra),
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            ];

            $resultado = $api->post('usuario', $data);

            if ($resultado && isset($resultado['sucesso']) && $resultado['sucesso'] === true) {
                header('Location: login.php');
                exit;
            } else {
                $mensagem = "Erro ao realizar o cadastro. Tente novamente.";
            }
        }
    }
}
?>

<main class="register-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card register-card">
                    <div class="card-header register-header">
                        <h3><i class="fas fa-user-plus me-2"></i>Criar Nova Conta</h3>
                    </div>
                    <div class="card-body login-body">

                        <?php if (!empty($mensagem)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($mensagem) ?></div>
                        <?php endif; ?>

                        <form method="POST" class="needs-validation" novalidate>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="login-input-group">
                                        <label for="nome" class="form-label">Nome Completo</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" id="nome" name="nome" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-input-group">
                                        <label for="ra" class="form-label">RA (Registro Acadêmico)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            <input type="text" class="form-control" id="ra" name="ra" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="login-input-group">
                                <label for="email" class="form-label">E-mail Institucional</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="login-input-group">
                                        <label for="senha" class="form-label">Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control" id="senha" name="senha"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-input-group">
                                        <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control" id="confirmar_senha"
                                                name="confirmar_senha" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="login-input-group">
                                <label for="curso" class="form-label">Curso</label>
                                <select class="form-select" id="curso" name="curso" required>
                                    <option value="" selected disabled>Selecione seu curso</option>
                                    <option value="1">Pedagogia</option>
                                    <option value="2">Sistemas para Internet</option>
                                    <option value="3">Direito</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-confirm btn-lg py-2">
                                    <i class="fas fa-check-circle me-2"></i>Confirmar Cadastro
                                </button>
                                <a href="login.php" class="btn btn-register btn-lg py-2">
                                    <i class="fas fa-sign-in-alt me-2"></i>Já tenho uma conta
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
// Validação simples de senha
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

            const senha = document.getElementById('senha')
            const confirmarSenha = document.getElementById('confirmar_senha')
            if (senha.value !== confirmarSenha.value) {
                confirmarSenha.setCustomValidity("As senhas não coincidem")
                confirmarSenha.classList.add('is-invalid')
            } else {
                confirmarSenha.setCustomValidity("")
            }
        }, false)
    })
})()
</script>

<?php
include './partials/footer.php';
?>