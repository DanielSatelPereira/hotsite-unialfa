<?php
require_once 'Conexao.php';

class EventoDAO
{
    /**
     * Busca um evento pelo ID
     * @param int $id ID do evento
     * @return array|null Retorna o evento ou null se não encontrar
     */
    public static function buscarPorId($id)
    {
        try {
            $con = Conexao::conectar();
            $sql = "SELECT * FROM eventos WHERE id = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Erro ao buscar evento por ID: " . $e->getMessage());
            return null;
        } finally {
            $con = null; // Garante que a conexão será fechada
        }
    }

    /**
     * Lista eventos por área
     * @param string $area Área dos eventos
     * @param int|null $limite Limite de resultados
     * @return array Retorna array de eventos
     */
    public static function listarPorArea($area, $limite = null)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT * FROM eventos WHERE area = :area ORDER BY data_evento DESC";

            if ($limite !== null && is_numeric($limite)) {
                $sql .= " LIMIT :limite";
            }

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':area', $area, PDO::PARAM_STR);

            if ($limite !== null && is_numeric($limite)) {
                $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar eventos por área: " . $e->getMessage());
            return [];
        } finally {
            $conn = null;
        }
    }

    /**
     * Busca eventos por termo no título ou descrição
     * @param string $termo Termo de busca
     * @return array Retorna array de eventos encontrados
     */
    public static function buscarPorTermo($termo)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT * FROM eventos 
                    WHERE titulo LIKE :termo OR descricao LIKE :termo
                    ORDER BY data_evento DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':termo', "%$termo%", PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar por termo: " . $e->getMessage());
            return [];
        } finally {
            $conn = null;
        }
    }

    /**
     * Lista todos os eventos
     * @param int|null $limite Limite de resultados
     * @return array Retorna array de eventos
     */
    public static function listarTodos($limite = null)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT * FROM eventos ORDER BY data_evento DESC";

            if ($limite !== null && is_numeric($limite)) {
                $sql .= " LIMIT :limite";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
            } else {
                $stmt = $conn->prepare($sql);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar todos os eventos: " . $e->getMessage());
            return [];
        } finally {
            $conn = null;
        }
    }
}
