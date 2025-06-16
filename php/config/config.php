<?php
// Caminhos base
define('BASE_PATH', dirname(__DIR__)); // Caminho absoluto
define('BASE_URL', 'http://localhost/hotsite-unialfa');

// Diretórios
define('CLASSES_DIR', BASE_PATH . '/php/classes/');
define('HELPERS_DIR', BASE_PATH . '/php/helpers/');
define('IMG_URL', BASE_URL . '/php/assets/img');
define('INCLUDES_DIR', __DIR__ . '/php/includes');

// API
define('API_BASE_URL', 'http://localhost:3001'); // URL da sua API Node.js local

// Autoloader
spl_autoload_register(function ($class) {
    $classPath = CLASSES_DIR . $class . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});