<?php

class Conexao
{
    private static $host = 'localhost';
    private static $db = 'unialfa_eventos';
    private static $user = 'root';
    private static $pass = '';

    public static function conectar()
    {
        try {
            $conn = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$db,
                self::$user,
                self::$pass
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
