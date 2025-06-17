import Router from 'express'
import knex from '../database/knex'
import { z } from 'zod'
import { compare } from 'bcryptjs'

const router = Router()

router.post("/", async (req, res) => {

    try {
        const registerBodySchema = z.object({
            email: z.string().email(),
            senha: z.string(),
            tipo: z.coerce.number().int()
        })

        const objSalvar = registerBodySchema.parse(req.body)

        const user = await knex("usuarios")
            .where({
                email: objSalvar.email,
                tipo: objSalvar.tipo
            })
            .first()

        if (!user) {
            res.status(400).json({ message: "Email ou senha inválidos." })
            return
        }

        const senhaIsIgual = await compare(
            objSalvar.senha,
            user.senha
        )

        if (!senhaIsIgual) {
            res.status(400).json({
                message: "Email ou senha inválidos."
            })
            return
        }

        if (user.tipo !== 1 && user.tipo !== 2) {
            res.status(404).json({ mensagem: 'Aluno/Palestrante inválido' })
            return
        }

        res.json({
            message: "Usuário logado!"
        })

    } catch {
        res.status(400).json({
            message: "Erro inesperado no login, tente novamente mais tarde!"
        })
    }
})

export default router