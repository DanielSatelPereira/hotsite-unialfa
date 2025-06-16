<?php
class ApiHelper
{
    public static function chamarAPI($endpoint, $dados = [])
    {
        $url = NODE_API_BASE . $endpoint;
        // Implementar chamada HTTP com file_get_contents ou cURL
    }
}