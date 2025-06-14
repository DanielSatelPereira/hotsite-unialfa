import {Router} from 'express'
import knex from './../database/knex'
import { z } from 'zod'
import { hash } from 'bcrypt'

const router = Router()

router.get('/', (req,res) => {
    knex('palestrantes')
        .then((resposta) => {
            res.json({palestrantes:resposta})
        })
})

router.post('/', async (req, res) => {

    try {

        const registerBodySchema = z.object({
            nome: z.string(),
            email: z.string().email(),
            senha: z.string().min (6)
        })

        const objSalvar = registerBodySchema.parse(
            req.body
        )

        const existeEmail = await knex('palestrantes')
            .where({ email: objSalvar.email })
            .first()

        if (existeEmail) {
            res.status(409).json({ mensagem: 'E-mail já cadastrado' })
            return
        }

        objSalvar.senha = await hash(objSalvar.senha, 8)

        const id_palestrante = await knex('palestrantes').insert(objSalvar)

        const palestrantes = await knex('palestrantes').where({id: id_palestrante[0]})

        res.json({ palestrantes: palestrantes})

    } catch (error) {
        
        if (error instanceof z.ZodError) {
                res.status(400).json({
                mensagem: 'Dados inválidos',
                erros: error.errors
            })
            return 
        }

        console.error(error)
        res.status(500).json({ mensagem: 'Erro interno no servidor' })
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

        if (objAlterar.senha) {
            objAlterar.senha = await hash(objAlterar.senha, 8);
        }

        await knex('palestrantes')
            .where({ id: objAlterar.id })
            .update(objAlterar);

        const palestranteAtualizado = await knex('palestrantes')
            .where({ id: objAlterar.id });

        res.json({ palestrante: palestranteAtualizado });
    } catch (error) {
        res.status(400).json({ error: "Erro ao atualizar palestrante" });
    }

})

router.delete('/', async (req, res) => {

    const deleteBodySchema = z.object({id: z.number()})

    try {
        const {id} = deleteBodySchema.parse(req.body)

        const palestrante = await knex('palestrantes')
            .where({ id })
            .first()

        if (!palestrante) {
            res.status(404).json({ mensagem: 'Palestrante não encontrado' })
            return
        }

        await knex('palestrantes')
            .where({id})
            .del()

        res.json({ mensagem: 'Palestrante deletado com sucesso!' })

    } catch (error) {
        res.status(400).json({ erro: 'Erro ao deletar' })
        return
    }
})

export default router