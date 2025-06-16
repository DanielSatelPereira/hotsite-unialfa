import { Router } from 'express';
import {
    verificaInscricao,
    criarInscricao,
    listarInscricoesPorAluno,
    listarInscricoesPorEvento
} from '../services/inscricaoService';

const router = Router();

// Verificar inscrição
router.get('/verificar/:alunoId/:eventoId', async (req, res) => {
    try {
        const { alunoId, eventoId } = req.params;
        const existeInscricao = await verificaInscricao(
            parseInt(alunoId),
            parseInt(eventoId)
        );
        res.json({ inscrito: existeInscricao });
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao verificar inscrição' });
    }
});

// Criar nova inscrição
router.post('/', async (req, res) => {
    try {
        const { alunoId, eventoId } = req.body;

        if (!alunoId || !eventoId) {
            return res.status(400).json({ mensagem: 'Dados incompletos' });
        }

        const jaInscrito = await verificaInscricao(alunoId, eventoId);
        if (jaInscrito) {
            return res.status(409).json({ mensagem: 'Aluno já inscrito neste evento' });
        }

        const sucesso = await criarInscricao(alunoId, eventoId);
        if (sucesso) {
            return res.status(201).json({ mensagem: 'Inscrição realizada com sucesso' });
        } else {
            return res.status(500).json({ mensagem: 'Falha ao realizar inscrição' });
        }
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao processar inscrição' });
    }
});

// Listar inscrições por aluno
router.get('/aluno/:alunoId', async (req, res) => {
    try {
        const inscricoes = await listarInscricoesPorAluno(parseInt(req.params.alunoId));
        res.json(inscricoes);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao listar inscrições' });
    }
});

// Listar inscrições por evento
router.get('/evento/:eventoId', async (req, res) => {
    try {
        const inscricoes = await listarInscricoesPorEvento(parseInt(req.params.eventoId));
        res.json(inscricoes);
    } catch (error) {
        console.error(error);
        res.status(500).json({ mensagem: 'Erro ao listar inscrições' });
    }
});

export default router;