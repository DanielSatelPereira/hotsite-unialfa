import { Router } from 'express';
import * as EventoService from '../services/eventosService';

const router = Router();

// GET /eventos
router.get('/', async (_, res) => {
    try {
        const eventos = await EventoService.listarTodos();
        res.json(eventos);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao listar eventos' });
    }
});

// GET /eventos/:id
router.get('/:id', async (req, res) => {
    const id = parseInt(req.params.id);
    try {
        const evento = await EventoService.buscarPorId(id);
        if (evento) {
            res.json(evento);
        } else {
            res.status(404).json({ mensagem: 'Evento não encontrado' });
        }
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao buscar evento por ID' });
    }
});

// GET /eventos/area/:idCurso
router.get('/area/:idCurso', async (req, res) => {
    const idCurso = parseInt(req.params.idCurso);
    try {
        const eventos = await EventoService.listarPorCurso(idCurso);
        res.json(eventos);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao buscar eventos da área' });
    }
});


// GET /eventos/curso/:idCurso?limit=5&offset=0
router.get('/curso/:idCurso', async (req, res) => {
    const idCurso = parseInt(req.params.idCurso);
    const limit = parseInt(req.query.limit as string) || 10;
    const offset = parseInt(req.query.offset as string) || 0;

    try {
        const eventos = await EventoService.listarPorCurso(idCurso, limit, offset);
        res.json(eventos);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao buscar eventos por curso' });
    }
});

// GET /eventos/busca/:termo
router.get('/busca/:termo', async (req, res) => {
    const termo = req.params.termo;
    try {
        const resultados = await EventoService.buscarPorTermo(termo);
        res.json(resultados);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao buscar eventos por termo' });
    }
});

export default router;
