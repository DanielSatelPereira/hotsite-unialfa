import Router from 'express'
import knex from '../database/knex'
import { z } from 'zod'
import { compare } from 'bcryptjs'

const router = Router()

router.post("/", async (req, res) => {

    const registerBodySchema = z.object({
        email: z.string().email(),
        senha: z.string()
    })

    const objSalvar = registerBodySchema.parse(req.body)

    const user = await knex("usuarios")
        .where({
            email: objSalvar.email
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

    res.json({
        message: "Usuário logado!"
    })
})

export default router