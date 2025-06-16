import {Router} from 'express'
import knex from '../database/knex'
import { z } from 'zod'
import { hash } from 'bcrypt'

const router = Router()

router.get('/', (req,res) => {
    knex('usuarios')
        .then((resposta) => {
            res.json({usuarios:resposta})
        })
})

router.post('/', async (req, res) => {

    try {

        const registerBodySchema = z.object({
            nome: z.string(),
            email: z.string().email(),
            senha: z.string().min (6),
        })

        const objSalvar = registerBodySchema.parse(
            req.body
        )

        const existeEmail = await knex('usuarios')
            .where({ email: objSalvar.email })
            .first()

        if (existeEmail) {
            res.status(409).json({ mensagem: 'E-mail já cadastrado' })
            return
        }

        objSalvar.senha = await hash(objSalvar.senha, 8)

        const id_usuario = await knex('usuarios').insert(objSalvar)

        const usuarios = await knex('usuarios').where({id: id_usuario[0]})

        res.json({ usuarios: usuarios})

    } catch (error) {
        
        if (error instanceof z.ZodError) {
                res.status(400).json({
                mensagem: 'Os dados inseridos são inválidos',
                erros: error.errors
            })
            return 
        }

        console.error(error)
        res.status(500).json({ mensagem: 'Não foi possível realizar o cadastro' })
        return
    }
})

router.put('/', async (req, res) => {

    let updateBodySchema = z.object({
        id: z.number(),
        nome: z.string(),
        email: z.string().email(),
        senha: z.string().min (6)
    })

    try {
        const objAlterar = updateBodySchema.parse(req.body);

        const usuario = await knex('usuarios')
            .where({ id: objAlterar.id })
            .first()

        if (!usuario) {
            res.status(404).json({ mensagem: 'Palestrante não encontrado' })
            return
        }

        if (usuario.tipo !== 2) {
            res.status(403).json({ mensagem: 'Palestrante não encontrado' })
            return
        }

        if (objAlterar.senha) {
            objAlterar.senha = await hash(objAlterar.senha, 8);
        }

        await knex('usuarios')
            .where({ id: objAlterar.id })
            .update(objAlterar);

        const palestranteAtualizado = await knex('usuarios')
            .where({ id: objAlterar.id });

        res.json({ usuario: palestranteAtualizado });
    } catch (error) {
        
        if (error instanceof z.ZodError) {
                res.status(400).json({
                mensagem: 'Os dados inseridos são inválidos',
                erros: error.errors
            })
            return 
        }

        res.status(400).json({ error: "Erro ao atualizar palestrante" });
    }

})

router.delete('/', async (req, res) => {

    const deleteBodySchema = z.object({id: z.number()})

    try {
        const {id} = deleteBodySchema.parse(req.body)

        const usuario = await knex('usuarios')
            .where({ id })
            .first()

        if (!usuario) {
            res.status(404).json({ mensagem: 'Palestrante não encontrado' })
            return
        }

        if (usuario.tipo !== 2) {
            res.status(403).json({ mensagem: 'Palestrante não encontrado' })
            return
        }

        await knex('usuarios')
            .where({id})
            .del()

        res.json({ mensagem: 'Palestrante deletado com sucesso!' })

    } catch (error) {
        res.status(400).json({ erro: 'Erro ao deletar' })
        return
    }
})

export default router