<?php
class ApiHelper
{
    private const NODE_API_BASE = 'http://localhost:3001/api/';

    private static function request(string $endpoint, array $dados = [], string $metodo = 'GET'): array
    {
        $url = self::NODE_API_BASE . ltrim($endpoint, '/');
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        if (in_array($metodo, ['POST', 'PUT', 'PATCH'])) {
            $payload = json_encode($dados);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }

        $resposta = curl_exec($ch);

        if (curl_errno($ch)) {
            error_log('cURL Error (' . curl_errno($ch) . '): ' . curl_error($ch));
            curl_close($ch);
            return ['sucesso' => false, 'erro' => 'Erro na comunicação com a API'];
        }

        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $data = json_decode($resposta, true);
        return [
            'sucesso' => ($status >= 200 && $status < 300),
            'status' => $status,
            'data' => $data
        ];
    }

    public static function chamarAPI(string $endpoint, array $dados = [], string $metodo = 'GET'): array
    {
        return self::request($endpoint, $dados, strtoupper($metodo));
    }

    public static function listarEventos(): array
    {
        return self::request('eventos', [], 'GET');
    }

    public static function inscreverAluno(int $alunoId, int $eventoId): array
    {
        return self::request('inscricoes', [
            'aluno_id' => $alunoId,
            'evento_id' => $eventoId
        ], 'POST');
    }
}