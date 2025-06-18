import { Request, Response } from 'express'
import { z } from 'zod'
import { eventoModel } from '../models/eventoModel'

export const eventoController = {

    async listar(req: Request, res: Response) {
        try {
            const eventos = await eventoModel.listar()
            if (eventos.length === 0) {
                res.status(404).json({message: "Nenhum evento encontrado"});
            }
            res.json({ eventos })
        } catch (error) {
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao encontrar Eventos' })
        }
    },
    
    async listarPorCurso(req: Request, res:Response) {
        const schema = z.object({
            idCurso: z.number()
        })
        try{
            const { idCurso } = schema.parse(req.query);
            const eventos = await eventoModel.listarPorCurso(idCurso);
            if (eventos.length === 0) {
                res.status(404).json({message: "Nenhum evento encontrado para este curso"});
            }
            res.json({ eventos });
        } catch (error){
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao encontrar eventos por curso' })
        }
    },

    async listarPorInscricao(req: Request, res:Response) {
        const schema = z.object({
            idInscricao: z.number()
        })
        try{
            const { idInscricao } = schema.parse(req.query);
            const eventos = await eventoModel.buscarInscricaoPorId(idInscricao);
            if (!eventos) {
                res.status(404).json({message: "Nenhum evento encontrado para esta inscrição"});
                return
            }
            res.json({ eventos });
        } catch (error){
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao encontrar Eventos Inscritos' })
        }
    }
}