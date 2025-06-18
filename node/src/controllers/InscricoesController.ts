import { Request, Response } from 'express';
import { InscricoesModel } from '../models/inscricoesModel';
import { CertificadosModel } from '../models/certificadosModel';
import { z } from 'zod';

export const inscricoesController = {
    async listarPorUsuario(req: Request, res: Response) {
        const { ra } = req.params;
        try {
            const inscricoes = await InscricoesModel.listarPorUsuario(Number(ra));
            res.json(inscricoes);
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao buscar inscrições' });
        }
    },

    async criar(req: Request, res: Response) {
        const schema = z.object({
            raUsuarios: z.number(),
            idEvento: z.number()
        });

        try {
            const dados = schema.parse(req.body);
            await InscricoesModel.criar(dados.raUsuarios, dados.idEvento);
            res.status(201).json({ mensagem: 'Inscrição criada com sucesso' });
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao criar inscrição' });
        }
    },

    async deletar(req: Request, res: Response) {
        const schema = z.object({
            id: z.number()
        });

        try {
            const { id } = schema.parse(req.body);
            // Deleta certificado vinculado
            await CertificadosModel.deletarPorInscricao(id);
            // Deleta inscrição
            await InscricoesModel.deletar(id);
            res.json({ mensagem: 'Inscrição e certificado deletados com sucesso' });
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao deletar inscrição' });
        }
    }
};
