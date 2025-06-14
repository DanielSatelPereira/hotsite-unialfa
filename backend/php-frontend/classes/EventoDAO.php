<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/Conexao.php';

class EventoDAO
{
    /**
     * Busca um evento completo com informações relacionadas
     * @param int $id ID do evento
     * @return array|null Retorna o evento com detalhes ou null se não encontrar
     */
    public static function buscarPorId($id)
    {
        $con = null;
        try {
            $con = Conexao::conectar();
            $sql = "SELECT e.*, c.nome as nome_curso, p.nome as nome_palestrante 
                    FROM eventos e
                    LEFT JOIN cursos c ON e.idCurso = c.id
                    LEFT JOIN palestrantes p ON e.idPalestrante = p.id
                    WHERE e.id = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Erro ao buscar evento por ID: " . $e->getMessage());
            return null;
        } finally {
            $con = null;
        }
    }

    /**
     * Lista eventos por curso
     * @param int $idCurso ID do curso
     * @param int|null $limite Limite de resultados
     * @return array Retorna array de eventos
     */
    public static function listarPorCurso($idCurso, $limite = null)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT e.*, p.nome as nome_palestrante 
                    FROM eventos e
                    LEFT JOIN palestrantes p ON e.idPalestrante = p.id
                    WHERE e.idCurso = :idCurso
                    ORDER BY e.data DESC, e.hora DESC";

            if ($limite !== null && is_numeric($limite)) {
                $sql .= " LIMIT :limite";
            }

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':idCurso', $idCurso, PDO::PARAM_INT);

            if ($limite !== null && is_numeric($limite)) {
                $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar eventos por curso: " . $e->getMessage());
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
