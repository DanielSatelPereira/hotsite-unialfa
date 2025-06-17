import { Router } from 'express';
import knex from '../database/knex';

const router = Router();

// Listar inscrições por RA de usuário
router.get('/usuario/:ra', async (req, res) => {
    const ra = parseInt(req.params.ra);

    try {
        const inscricoes = await knex('inscricoes')
            .join('eventos', 'inscricoes.idEvento', '=', 'eventos.id')
            .where('inscricoes.raUsuarios', ra)
            .select('eventos.titulo', 'eventos.data', 'eventos.hora');

        res.json(inscricoes);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao buscar inscrições do usuário' });
    }
});

export default router;
