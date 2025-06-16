<?php
// Inclui cabeçalho e validação de sessão (se necessário)  
require_once __DIR__ . '/includes/header.php';
?>

<form id="form-inscricao" action="/api/inscricao" method="POST">
    <input type="text" name="evento_id" placeholder="ID do Evento" required>
    <input type="text" name="academico_id" placeholder="Seu ID" required>
    <button type="submit">Inscrever-se</button>
</form>

<script>
// Envia o formulário via AJAX para evitar recarregar a página  
document.getElementById('form-inscricao').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);

    try {
        const response = await fetch(e.target.action, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();

        if (result.success) {
            alert("Inscrição realizada com sucesso!");
            window.location.href = "/eventos.php"; // Redireciona  
        } else {
            alert("Erro: " + result.message);
        }
    } catch (error) {
        alert("Erro na requisição: " + error);
    }
});
</script>

<?php
require_once __DIR__ . '/includes/footer.php';
?>