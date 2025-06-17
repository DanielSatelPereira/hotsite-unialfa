import { Request, Response } from 'express'
import { z } from 'zod'
import { eventoModel } from '../models/eventoModel'

export const eventoController = {

    async listar(req: Request, res: Response) {
        const schema = z.object({
            id: z.number()
        })

        try {
            
            const dadosEvento = schema.parse(req.body);

            const existeEvento = await eventoModel.buscarPorId(dadosEvento.id)
            
            if (!existeEvento) {
                res.status(404).json({message: "Nenhum evento encontrado"});
            }

            const eventos = await eventoModel.listar()
            res.json({ eventos })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao encontrar Eventos Inscritos' })
        }
    },
    
    async listarPorCurso(req: Request, res:Response) {

        const schema = z.object({
            idCurso: z.number()
        })

        try{

            const dadosEvento = schema.parse(req.body);

            const eventosCurso = await eventoModel.listarPorCurso(dadosEvento.idCurso);
            
            if (!eventosCurso) {
                res.status(404).json({message: "Nenhum evento encontrado para este curso"});
            }
            
            res.json({ eventosCurso });

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
            const dadosEvento = schema.parse(req.body);

            const eventosInscrito = await eventoModel.buscarInscricaoPorId(dadosEvento.idInscricao);
            
            if (!eventosInscrito) {
                res.status(404).json({message: "Você não está inscrito em nenhum evento!"});
            }
            
            res.json({ eventosInscrito });

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