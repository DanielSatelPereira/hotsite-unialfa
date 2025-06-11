<?php
class Conexao
{
    public static function conectar()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=hotsite", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}