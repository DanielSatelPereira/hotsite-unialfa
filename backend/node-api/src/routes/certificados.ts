import {Router} from 'express'
import knex from './../database/knex'
import { z } from 'zod'

const router = Router()

router.get('/', (req,res) => {
    knex('certificados')
        .then((resposta) => {
            res.json({certificados:resposta})
        })
})

// router.post('/', async (req, res) => {

//     const registerBodySchema = z.object({
//         nome: z.string(),
//         email: z.string().email(),
//         senha: z.string().min (6)
//     })

//     const objSalvar = registerBodySchema.parse(
//         req.body
//     )

//     objSalvar.senha = await hash(objSalvar.senha, 8)

//     const id_palestrante = await knex('palestrantes').insert(objSalvar)

//     const palestrantes = await knex('palestrantes').where({id: id_palestrante[0]})

//     res.json({ palestrantes: palestrantes})

//     return
// })

// router.put('/', async (req, res) => {

//     let updateBodySchema = z.object({
//         id: z.number(),
//         nome: z.string(),
//         email: z.string().email(),
//         senha: z.string().min (6)
//     })

//     try {
//         const objAlterar = updateBodySchema.parse(req.body);

//         if (objAlterar.senha) {
//             objAlterar.senha = await hash(objAlterar.senha, 8);
//         }

//         await knex('palestrantes')
//             .where({ id: objAlterar.id })
//             .update(objAlterar);

//         const palestranteAtualizado = await knex('palestrantes')
//             .where({ id: objAlterar.id });

//         res.json({ palestrante: palestranteAtualizado });
//     } catch (error) {
//         res.status(400).json({ error: "Erro ao atualizar palestrante" });
//     }

// })

// router.delete('/', async (req, res) => {

//     const deleteBodySchema = z.object({id: z.number()})

//     try {
//         const {id} = deleteBodySchema.parse(req.body)

//         await knex('palestrantes')
//             .where({id})
//             .del()

//         res.json({ mensagem: 'Palestrante deletado com sucesso!' })

//     } catch (error) {
//         res.status(400).json({ erro: 'Erro ao deletar' })
//         return
//     }
// })

export default router