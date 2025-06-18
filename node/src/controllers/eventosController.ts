import { Request, Response } from 'express';
import { EventosModel } from '../models/eventosModel';

export const eventosController = {
    async listarTodos(req: Request, res: Response) {
        try {
            const eventos = await EventosModel.listarTodos();
            res.json(eventos);
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao listar eventos' });
        }
    },

    async buscarPorId(req: Request, res: Response) {
        const { id } = req.params;
        try {
            const evento = await EventosModel.buscarPorId(Number(id));
            if (!evento) {
                return res.status(404).json({ mensagem: 'Evento não encontrado' });
            }
            res.json(evento);
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao buscar evento por ID' });
        }
    },

    async buscarPorArea(req: Request, res: Response) {
        const { area } = req.params;
        try {
            const eventos = await EventosModel.buscarPorArea(area);
            res.json(eventos);
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao buscar eventos por área' });
        }
    }
};
