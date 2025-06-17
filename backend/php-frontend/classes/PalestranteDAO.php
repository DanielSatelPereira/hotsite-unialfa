// FUTURO
<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/Conexao.php';

class PalestranteDAO
{
    /**
     * Busca palestrante por ID
     * @param int $id ID do palestrante
     * @return array|null Dados do palestrante ou null se não encontrado
     */
    public static function buscarPorId($id)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->prepare("SELECT * FROM palestrantes WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Erro ao buscar palestrante: " . $e->getMessage());
            return null;
        } finally {
            $conn = null;
        }
    }

    /**
     * Lista todos os palestrantes ordenados por nome
     * @return array Lista de palestrantes
     */
    public static function listarTodos()
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->query("SELECT * FROM palestrantes ORDER BY nome");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar palestrantes: " . $e->getMessage());
            return [];
        } finally {
            $conn = null;
        }
    }

    /**
     * Lista eventos associados a um palestrante
     * @param int $idPalestrante ID do palestrante
     * @return array Lista de eventos
     */
    public static function listarEventosPorPalestrante($idPalestrante)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->prepare("SELECT * FROM eventos WHERE idPalestrante = :id ORDER BY data DESC");
            $stmt->bindValue(':id', $idPalestrante, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar eventos do palestrante: " . $e->getMessage());
            return [];
        } finally {
            $conn = null;
        }
    }

    /**
     * Conta quantos eventos um palestrante possui
     * @param int $idPalestrante ID do palestrante
     * @return int Número de eventos
     */
    public static function countEventos($idPalestrante)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->prepare("SELECT COUNT(*) as total FROM eventos WHERE idPalestrante = :id");
            $stmt->bindValue(':id', $idPalestrante, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int)$result['total'];
        } catch (PDOException $e) {
            error_log("Erro ao contar eventos do palestrante: " . $e->getMessage());
            return 0;
        } finally {
            $conn = null;
        }
    }
}