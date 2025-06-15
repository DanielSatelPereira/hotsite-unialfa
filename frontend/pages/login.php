<?php
require_once __DIR__ . '/../../backend/php-frontend/config/constants.php';
require_once __DIR__ . '/../../backend/php-frontend/classes/UsuarioDAO.php';

// Modo de operação
$modoAPI = false; // Alterar para true quando o Node.js estiver pronto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if ($modoAPI) {
        // FUTURO: Chamada à API Node.js
        // $usuario = file_get_contents(NODE_API_URL . '/login?email=' . urlencode($email) . '&senha=' . urlencode($senha));
    } else {
        // Modo temporário com autenticação local
        $usuario = UsuarioDAO::autenticar($email, $senha);
    }

    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['api_mode'] = $modoAPI;

        header('Location: ' . BASE_URL . '/frontend/pages/');
        exit;
    } else {
        $erro = "Credenciais inválidas!";
    }
}


// Cabeçalho
$pageTitle = "Login - αEventos";
require_once __DIR__ . '/../../backend/php-frontend/includes/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login</h2>

                    <?php if (!empty($erro)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../../backend/php-frontend/includes/footer.php';
?>