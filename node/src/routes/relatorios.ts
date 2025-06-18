import { Router } from 'express';
import knex from '../database/knex';

const router = Router();

// Relatório: quantidade de alunos por evento
router.get('/inscricoes-por-evento', async (req, res) => {
    try {
        const resultado = await knex('eventos')
            .leftJoin('inscricoes', 'eventos.id', '=', 'inscricoes.idEvento')
            .select('eventos.titulo')
            .count('inscricoes.id as quantidade')
            .groupBy('eventos.id');

        res.json(resultado);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao gerar relatório' });
    }
});

export default router;
