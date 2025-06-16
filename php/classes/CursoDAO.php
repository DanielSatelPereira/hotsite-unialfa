<?php
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/Conexao.php';

class CursoDAO
{
    /**
     * Busca um curso completo por ID
     * @param int $id ID do curso
     * @return array|null Dados do curso ou null se não encontrado
     */
    public static function buscarPorId($id)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->prepare("SELECT * FROM cursos WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Erro ao buscar curso: " . $e->getMessage());
            return null;
        } finally {
            $conn = null;
        }
    }

    /**
     * Lista todos os cursos
     */
    public static function listarTodos()
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->query("SELECT * FROM cursos ORDER BY nome");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao listar cursos: " . $e->getMessage());
            return [];
        } finally {
            $conn = null;
        }
    }

    /**
     * Obtém o nome do curso por ID
     */
    public static function getNomeCurso($id)
    {
        $conn = null;
        try {
            $conn = Conexao::conectar();
            $stmt = $conn->prepare("SELECT nome FROM cursos WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nome'] ?? 'Área Desconhecida';
        } catch (PDOException $e) {
            error_log("Erro ao buscar nome do curso: " . $e->getMessage());
            return 'Área Desconhecida';
        } finally {
            $conn = null;
        }
    }
}
