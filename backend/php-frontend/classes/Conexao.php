<?php
require_once __DIR__ . '/../config/environment.php';

class Conexao
{
    public static function conectar()
    {
        try {
            $conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                DB_USER,
                DB_PASS
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            // Em produção, registra log
            error_log("[ERRO BD] " . $e->getMessage());

            header("Location: /pages/erro.php?msg=Erro na conexão com o banco de dados");
            exit;
        }
    }
}