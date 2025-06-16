<?php
require_once __DIR__ . '/../config/Conexao.php';

/**
 * Classe responsável pelas operações relacionadas às inscrições no banco de dados.
 */
class InscricaoDAO
{
    /**
     * Verifica se um aluno já está inscrito em um evento.
     *
     * @param int $alunoId ID do aluno
     * @param int $eventoId ID do evento
     * @return bool Retorna true se estiver inscrito, false caso contrário
     */
    public static function verificaInscricao($alunoId, $eventoId)
    {
        try {
            $conn = Conexao::conectar();

            $sql = "SELECT COUNT(*) FROM inscricoes WHERE aluno_id = :alunoId AND evento_id = :eventoId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':alunoId', $alunoId, PDO::PARAM_INT);
            $stmt->bindParam(':eventoId', $eventoId, PDO::PARAM_INT);
            $stmt->execute();

            $count = $stmt->fetchColumn(); // retorna só o número

            return $count > 0;
        } catch (PDOException $e) {
            error_log("[ERRO verificação inscrição] " . $e->getMessage());
            return false;
        }
    }

    /**
     * Cria uma nova inscrição para o aluno em um evento.
     *
     * @param int $alunoId ID do aluno
     * @param int $eventoId ID do evento
     * @return bool Retorna true se a inscrição for realizada com sucesso, false em caso de erro
     */
    public static function criarInscricao($alunoId, $eventoId)
    {
        try {
            $conn = Conexao::conectar();

            $sql = "INSERT INTO inscricoes (aluno_id, evento_id, data_inscricao) VALUES (:alunoId, :eventoId, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':alunoId', $alunoId, PDO::PARAM_INT);
            $stmt->bindParam(':eventoId', $eventoId, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("[ERRO criação inscrição] " . $e->getMessage());
            return false;
        }
    }
}
