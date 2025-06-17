import { Request, Response } from 'express'
import { z } from 'zod'
import { UsuarioModel } from '../models/usuarioModel'

export const usuarioController = {

    async listar(req: Request, res: Response) {
        const usuarios = await UsuarioModel.listar()
        res.json({ usuarios })
    },

    async criar(req: Request, res: Response) {

        const schema = z.object({
            nome: z.string(),
            email: z.string().email(),
            senha: z.string().min(6),
            tipo: z.coerce.number().int()
        })

        try {
            const dadosUsuario = schema.parse(req.body)

            const existeEmail = await UsuarioModel.buscarPorEmail(dadosUsuario.email)
            
            if (existeEmail) {
                res.status(409).json({ mensagem: 'E-mail já cadastrado' })
                return
            }

            const id = await UsuarioModel.inserir(dadosUsuario)
            const usuario = await UsuarioModel.buscarPorId(id)
            res.status(201).json({ usuario })

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
            nome: z.string(),
            email: z.string().email(),
            senha: z.string().min(6)
        })

        try {

            const dadosUsuario = schema.parse(req.body)

            const usuario = await UsuarioModel.buscarPorId(dadosUsuario.id)
            if (!usuario || usuario.tipo !== 2) {
                res.status(404).json({ mensagem: 'Palestrante não encontrado' })
                return
            }

            const usuarioAtualizando = { ...dadosUsuario, tipo: usuario.tipo }

            await UsuarioModel.atualizar(usuarioAtualizando)
            const usuarioAtualizado = await UsuarioModel.buscarPorId(dadosUsuario.id)

            res.json({ usuario: usuarioAtualizado })

        } catch (error) {
            if (error instanceof z.ZodError) {
                res.status(400).json({ mensagem: 'Dados inválidos', erros: error.errors })
                return 
            }
            console.error(error)
            res.status(500).json({ mensagem: 'Erro ao atualizar palestrante' })
        }
    },

    async deletar(req: Request, res: Response) {

        const schema = z.object({
            id: z.number(),
            tipo: z.number().int()
        })

        try {
            const { id } = schema.parse(req.body)

            const usuario = await UsuarioModel.buscarPorId(id)

            if (!usuario || usuario.tipo !== 2) {
                res.status(404).json({ mensagem: 'Palestrante não encontrado' })
                return
            }

            await UsuarioModel.deletar(id)
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