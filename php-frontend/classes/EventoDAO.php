<?php
require_once 'Conexao.php';

class EventoDAO
{
    public static function buscarPorId($id)
    {
        try {
            $con = Conexao::conectar();
            $sql = "SELECT * FROM eventos WHERE id = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);
            $con = null;
            return $evento;
        } catch (PDOException $e) {
            error_log("Erro ao buscar evento por ID: " . $e->getMessage());
            return null;
        }
    }

    public static function listarPorArea($area, $limite = null)
    {
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT * FROM eventos WHERE area = :area";
            if ($limite !== null) {
                $sql .= " LIMIT :limite";
            }

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':area', $area);
            if ($limite !== null) {
                $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
            }

            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            return $resultados;
        } catch (PDOException $e) {
            error_log("Erro ao listar eventos por área: " . $e->getMessage());
            return [];
        }
    }

    public static function buscarPorTermo($termo)
    {
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT * FROM eventos WHERE titulo LIKE :termo OR descricao LIKE :termo";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['termo' => "%$termo%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar por termo: " . $e->getMessage());
            return [];
        }
    }
}