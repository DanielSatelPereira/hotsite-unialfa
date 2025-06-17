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
    public static function buscarPorId(int $id): ?array
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT e.*, c.nome as nome_curso, u.nome as nome_organizador 
                    FROM eventos e
                    LEFT JOIN cursos c ON e.idCurso = c.id
                    LEFT JOIN usuarios u ON e.idUsuarios = u.id
                    WHERE e.id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Erro ao buscar evento por ID: " . $e->getMessage());
            return null;
        } finally {
            $conn = null;
        }
    }

    /**
     * Lista eventos por curso
     * @param int $idCurso ID do curso
     * @param int $limit Limite de resultados
     * @param int $offset Offset para paginação
     * @return array Retorna array de eventos
     */
    public static function listarPorCurso(int $idCurso, int $limit = 10, int $offset = 0): array
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $sql = "SELECT e.*, u.nome as nome_organizador 
                    FROM eventos e
                    JOIN usuarios u ON e.idUsuarios = u.id
                    WHERE e.idCurso = :idCurso
                    ORDER BY e.data DESC, e.hora DESC
                    LIMIT :limit OFFSET :offset";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':idCurso', $idCurso, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
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
    public static function buscarPorTermo(string $termo): array
    {
        $conn = Conexao::conectar();
        try {
            $stmt = $conn->prepare("SELECT e.*, c.nome as nome_curso 
                               FROM eventos e
                               LEFT JOIN cursos c ON e.idCurso = c.id
                               WHERE e.titulo LIKE :termo OR e.descricao LIKE :termo
                               ORDER BY e.data DESC");
            $stmt->bindValue(':termo', "%$termo%", PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar por termo: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Lista todos os eventos
     * @param int|null $limit Limite de resultados
     * @return array Retorna array de eventos
     */
    public static function listarTodos(): array
    {
        $conn = Conexao::conectar();
        try {
            $stmt = $conn->query("SELECT e.*, c.nome as nome_curso 
                             FROM eventos e
                             LEFT JOIN cursos c ON e.idCurso = c.id
                             ORDER BY e.data DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar todos os eventos: " . $e->getMessage());
            return [];
        }
    }
}
