import { Request, Response } from 'express';
import { CertificadosModel } from '../models/certificadosModel';
import { z } from 'zod';

export const certificadosController = {
    async listar(req: Request, res: Response) {
        try {
            const certificados = await CertificadosModel.listar();
            res.json(certificados);
        } catch (error) {
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao listar certificados' });
        }
    },

    async deletarPorInscricao(req: Request, res: Response) {
        const schema = z.object({
            idInscricao: z.number()
        });

        try {
            const { idInscricao } = schema.parse(req.body);
            await CertificadosModel.deletarPorInscricao(idInscricao);
            res.json({ mensagem: 'Certificado deletado com sucesso' });
        } catch (error) {
            if (error instanceof z.ZodError) {
                return res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors });
            }
            console.error(error);
            res.status(500).json({ mensagem: 'Erro ao deletar certificado' });
        }
    }
};
