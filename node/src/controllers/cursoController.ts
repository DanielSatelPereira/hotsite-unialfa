import { Request, Response } from 'express'
import { z } from 'zod'
import { cursoModel } from '../models/cursoModel'

export const cursoController = {
    async listar(req: Request, res: Response) {
        try {
            const cursos = await cursoModel.listar()
            if (cursos.length === 0) {
                res.status(404).json({ message: "Nenhum curso encontrado"});
            }
            res.json({ cursos })
        } catch (error) {
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao listar cursos' })
        }
    },
    async buscarPorId(req:Request, res: Response) {
        const schema = z.object({
            id: z.number()
        })
        try {
            const { id } = schema.parse(req.query);
            const curso = await cursoModel.buscarPorId(id)
            if (!curso) {
                res.status(404).json({message: "Nenhum curso encontrado"});
            }
            res.json({ curso })
        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao buscar curso' })
        }
    }
}