import { Router } from 'express';
import knex from '../database/knex';

const router = Router();

// Rota para buscar eventos por área (curso)
router.get('/area/:area', async (req, res) => {
    const area = req.params.area;

    try {
        const eventos = await knex('eventos')
            .join('cursos', 'eventos.idCurso', '=', 'cursos.id')
            .where('cursos.nome', 'like', `%${area}%`)
            .select(
                'eventos.id',
                'eventos.titulo',
                'eventos.descricao',
                'eventos.data',
                'eventos.hora',
                'eventos.local',
                'eventos.imagem'
            );

        res.json(eventos);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao buscar eventos por área' });
    }
});



// (Se quiser, futuramente pode adicionar rotas GET /eventos ou GET /eventos/:id aqui)

export default router;
