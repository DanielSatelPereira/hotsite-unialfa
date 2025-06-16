<?php
class ApiHelper
{
    private const NODE_API_BASE = 'http://localhost:3001/api/'; // Altere se necessário

    public static function chamarAPI(string $endpoint, array $dados = [], string $metodo = 'GET')
    {
        $url = self::NODE_API_BASE . ltrim($endpoint, '/');

        $opcoes = [
            'http' => [
                'method'  => $metodo,
                'header'  => 'Content-type: application/json',
                'content' => $dados ? json_encode($dados) : ''
            ]
        ];

        $contexto = stream_context_create($opcoes);

        try {
            $resposta = file_get_contents($url, false, $contexto);
            return json_decode($resposta, true);
        } catch (Exception $e) {
            error_log("Erro na chamada API: " . $e->getMessage());
            return [
                'sucesso' => false,
                'erro' => 'Falha na comunicação com o servidor'
            ];
        }
    }

    // Métodos específicos para facilitar
    public static function listarEventos()
    {
        return self::chamarAPI('eventos');
    }

    public static function inscreverAluno($alunoId, $eventoId)
    {
        return self::chamarAPI('inscricoes', [
            'aluno_id' => $alunoId,
            'evento_id' => $eventoId
        ], 'POST');
    }
}
