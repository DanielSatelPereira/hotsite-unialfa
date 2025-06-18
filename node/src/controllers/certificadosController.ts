import { Request, Response } from 'express'
import { z } from 'zod'
import { certificadoModel } from '../models/certificadoModel'


export const certificadoController = {
    async listar(req: Request, res: Response) {
        const schema = z.object({
            idInscricao: z.number()
        })
        try {
            const { idInscricao } = schema.parse(req.query);
            const certificados = await certificadoModel.listarPorInscricao(idInscricao);
            if (certificados.length === 0) {
                return res.status(404).json({ mensagem: 'Certificado não encontrado' });
            }
            res.json({ certificados });
        } catch (error){
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao listar certificados' })
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
            const certificadoExiste = await certificadoModel.listarPorInscricao(dadosCertificado.idInscricao);
            if (certificadoExiste.length > 0) {
                return res.status(409).json({ mensagem: 'Certificado já existe para esta inscrição' });
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
            res.status(500).json({ mensagem: 'Erro ao gerar certificado' })
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
            const certificadoExiste = await certificadoModel.listarPorInscricao(idInscricao);
            if (certificadoExiste.length === 0) {
                return res.status(404).json({ mensagem: 'Certificado não encontrado' });
            }
            await certificadoModel.deletarPorInscricaoId(idInscricao)
            res.json({ mensagem: 'Certificado deletado com sucesso' })
        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Erro de validação', erros: error.errors })
                return
            }
            res.status(500).json({ mensagem: 'Erro ao deletar certificado' })
        }
    }
}