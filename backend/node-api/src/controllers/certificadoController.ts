import { Request, Response } from 'express'
import { z } from 'zod'
import { certificadoModel } from '../models/certificadoModel'

export const certificadoController = {

    async listar(req: Request, res: Response) {

        const schema = z.object({
            idInscricao: z.number()
        })
        
        try {

            const dadosCertificado = schema.parse(req.body)
            const id = await certificadoModel.inserir(dadosCertificado)
            const certificados = await certificadoModel.listarPorInscricao(id)
            res.json({ certificados })

        } catch (error){
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao cadastrar usuário' })
        }
    },

    async criar(req: Request, res: Response) {

        const schema = z.object({
            idInscricao: z.number()
        })

        try {
            const dadosCertificado = schema.parse(req.body)

            const incricaoExiste = await certificadoModel.buscarInscricaoPorId(dadosCertificado.idInscricao)

            if(!incricaoExiste) {
                res.status(404).json({ mensagem: 'Não foi encontrada sua inscrição!' })
                return
            }

            const id = await certificadoModel.inserir(dadosCertificado)
            const certificado = await certificadoModel.buscarPorId(id)
            res.status(201).json({ certificado })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao cadastrar usuário' })
        }
    },

    async deletar(req: Request, res: Response) {
        const schema = z.object({
            idInscricao: z.number(),
        })

        try {
            const { idInscricao } = schema.parse(req.body)

            const inscricao = await certificadoModel.buscarPorId(idInscricao)

            if (!inscricao) {
                res.status(404).json({ mensagem: 'Inscrição não encontrada' })
                return
            }

            await certificadoModel.deletarPorInscricaoId(idInscricao)
            res.json({ mensagem: 'Palestrante deletado com sucesso' })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Erro de validação', erros: error.errors })
                return
            }
            res.status(500).json({ mensagem: 'Não é possível deletar um palestrante vinculado a um evento!' })
        }
    }
}