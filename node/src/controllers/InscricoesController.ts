import { Request, Response } from 'express'
import { z } from 'zod'
import { inscricaoModel } from '../models/inscricaoModel'
import { certificadoModel } from '../models/certificadoModel'

export const inscricaoController = {

    async listar(req: Request, res: Response) {
        const inscricoes = await inscricaoModel.listar()
        res.json({ inscricoes })
    },

    async criar(req: Request, res: Response) {

        const schema = z.object({
            raUsuario: z.number(),
            idEvento: z.number()
        })

        try {
            const dadosInscricao = schema.parse(req.body)

            const existeEvento = await inscricaoModel.buscarPorEvento(dadosInscricao.idEvento)
            
            if (existeEvento) {
                res.status(409).json({ mensagem: 'Você já está cadastrado nesse evento' })
                return
            }

            const id = await inscricaoModel.inserir(dadosInscricao)
            const inscricao = await inscricaoModel.buscarPorId(id)
            res.status(201).json({ inscricao })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao cadastrar usuário' })
        }
    },

    async atualizar(req: Request, res: Response) {

        const schema = z.object({
            id: z.number(),
            idEvento: z.number()
        })

        try {

            const dadosInscricao = schema.parse(req.body)

            const inscricao = await inscricaoModel.buscarPorId(dadosInscricao.id)

            const existeEvento = await inscricaoModel.buscarPorEvento(dadosInscricao.idEvento)

            if (!inscricao || !existeEvento) {
                res.status(404).json({ mensagem: 'Inscrição ou Evento não encontrado' })
                return
            }

            const inscricaoAtualizado = await inscricaoModel.buscarPorId(dadosInscricao.id)

            res.json({ usuario: inscricaoAtualizado })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return 
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao atualizar inscrição' })
        }
    },

    async deletar(req: Request, res: Response) {

        const schema = z.object({
            id: z.number(),
        })

        try {
            const { id } = schema.parse(req.body);

            const inscricao = await inscricaoModel.buscarPorId(id);

            if (!inscricao) {
                res.status(404).json({ mensagem: 'Inscrição não encontrada' });
                return
            }

            await certificadoModel.deletarPorInscricaoId(id);

            await inscricaoModel.deletar(id); //ainda não está funcionando
            
            res.json({ mensagem: 'Inscrição deletada com sucesso' });

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Erro de validação', erros: error.errors })
                return
            }
            res.status(500).json({ mensagem: 'Não foi possível deletar a incrição' })
        }
    }
}