<?php
session_start();

$pageTitle = "Cadastro - αEventos";
require './api/ApiHelper.php';
include './partials/header.php';

$api = new ApiHelper();
$mensagem = "";

// ✅ Quando o formulário for enviado:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    // ✅ Validação simples
    if (empty($nome) || empty($ra) || empty($email) || empty($senha) || empty($confirmarSenha)) {
        $mensagem = "Por favor, preencha todos os campos.";
    } elseif ($senha !== $confirmarSenha) {
        $mensagem = "As senhas não coincidem.";
    } else {
        // ✅ Buscar todos os usuários na API
        $usuarios = $api->get('/usuarios');

        $raEncontrado = false;
        $usuarioJaCadastrado = false;
        var_dump($usuarios);
        die();

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
            $mensagem = "Este RA já possui cadastro. Faça login.";
        } else {
            // ✅ Envia cadastro para a API
            $data = [
                'ra' => intval($ra),
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            ];

            $resultado = $api->post('usuarios', $data);
            var_dump($resultado);
            die();

            if ($resultado && isset($resultado['usuario'])) {
                $_SESSION['mensagem_sucesso'] = 'Cadastro realizado com sucesso!';
                header('Location: login.php');
                exit;
            } else {
                $mensagem = "Erro ao realizar o cadastro. Tente novamente.";
            }
        }
    }
}
?>

<div class="container py-5">
    <h2 class="mb-4 text-primary"><i class="fas fa-user-plus me-2"></i>Criar Nova Conta</h2>

    <?php if (!empty($mensagem)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <form method="POST" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="ra" class="form-label">RA (Registro Acadêmico)</label>
                <input type="number" class="form-control" id="ra" name="ra" required>
            </div>
        </div>

        <div class="mt-3">
            <label for="email" class="form-label">E-mail Institucional</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-md-6">
                <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required>
            </div>
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-check-circle me-1"></i> Confirmar Cadastro
            </button>
            <a href="login.php" class="btn btn-secondary btn-lg">
                <i class="fas fa-sign-in-alt me-1"></i> Já tenho uma conta
            </a>
        </div>
    </form>
</div>

<script>
// ✅ Validação de senhas iguais
document.getElementById('confirmar_senha').addEventListener('input', function() {
    const senha = document.getElementById('senha').value;
    if (this.value !== senha) {
        this.setCustomValidity("As senhas não coincidem");
    } else {
        this.setCustomValidity("");
    }
});
</script>

<?php include './partials/footer.php'; ?>