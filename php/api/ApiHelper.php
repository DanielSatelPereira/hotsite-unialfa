class ApiHelper
{
private static $apiBaseUrl = 'http://localhost:3001/api';

public static function chamarAPI($endpoint, $params = [], $method = 'GET')
{
$url = self::$apiBaseUrl . '/' . ltrim($endpoint, '/');

$options = [
'http' => [
'method' => $method,
'header' => "Content-type: application/json\r\n",
'timeout' => 15
]
];

if ($method === 'POST') {
$options['http']['content'] = json_encode($params);
} elseif ($method === 'GET' && !empty($params)) {
$url .= '?' . http_build_query($params);
}

try {
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

return [
'sucesso' => true,
'dados' => json_decode($response, true)
];
} catch (Exception $e) {
return [
'sucesso' => false,
'erro' => 'Serviço indisponível'
];
}
}
}