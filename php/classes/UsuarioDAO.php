<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/Conexao.php';

class UsuarioDAO
{
    /**
     * Autenticação local temporária (será substituída por chamada à API)
     */
    public static function autenticar(string $email, string $senha): ?array
    {
        // Lista fixa temporária - será removida quando o Node.js estiver pronto
        $usuariosPermitidos = [
            'admin@unialfa.com' => [
                'id' => 1,
                'nome' => 'Admin Temporário',
                'tipo' => 0,
                'senha_hash' => password_hash('admin123', PASSWORD_BCRYPT)
            ],
            'palestrante@unialfa.com' => [
                'id' => 2,
                'nome' => 'Palestrante Temp',
                'tipo' => 1,
                'senha_hash' => password_hash('palestrante123', PASSWORD_BCRYPT)
            ]
        ];

        if (isset($usuariosPermitidos[$email])) {
            $usuario = $usuariosPermitidos[$email];
            if (password_verify($senha, $usuario['senha_hash'])) {
                unset($usuario['senha_hash']);
                return $usuario;
            }
        }
        return null;
    }

    /**
     * Método temporário para desenvolvimento
     */
    public static function buscarDummyData(): array
    {
        return [
            'sistema' => 'Modo de desenvolvimento',
            'mensagem' => 'Esta é uma implementação temporária até a API do Node.js estar disponível'
        ];
    }
}