import { Request, Response } from 'express'
import { z } from 'zod'
import { cursoModel } from '../models/cursoModel'

export const cursoController = {

    async listar(req: Request, res: Response) {
        const schema = z.object({
            id: z.number()
        })

        try {
            
            const dadosCurso = schema.parse(req.body);

            const existeCurso = await cursoModel.buscarPorId(dadosCurso.id)
            
            if (!existeCurso) {
                res.status(404).json({message: "Nenhum curso encontrado"});
            }

            const cursos = await cursoModel.listar()
            res.json({ cursos })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao encontrar Eventos Inscritos' })
        }
    }
}