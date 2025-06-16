import { Router } from 'express';
import { z } from 'zod';
import {
    listarUsuarios,
    cadastrarUsuario,
    atualizarUsuario,
    deletarUsuario
} from '../services/usuarioService';
import knex from '../database/knex';
import { hash } from 'bcrypt';

const router = Router();
const SALT_ROUNDS = 8;

// Tipos de dados
interface IUsuarioCreate {
    nome: string;
    email: string;
    senha: string;
}

// Listar todos os usuários
router.get('/', async (_, res) => {
    try {
        const usuarios = await listarUsuarios();
        return res.json({ usuarios });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ mensagem: 'Erro ao listar usuários' });
    }
});

// Cadastrar novo usuário
router.post('/', async (req, res) => {
    const schema = z.object({
        nome: z.string().min(3),
        email: z.string().email(),
        senha: z.string().min(6)
    });

    try {
        const data = schema.parse(req.body);
        const existente = await knex('usuarios').where({ email: data.email }).first();

        if (existente) {
            return res.status(409).json({ mensagem: 'E-mail já cadastrado' });
        }

        const novoUsuario = await cadastrarUsuario({
            ...data,
            senha: await hash(data.senha, SALT_ROUNDS)
        });
        return res.status(201).json({ usuario: novoUsuario });

    } catch (error) {
        if (error instanceof z.ZodError) {
            return res.status(400).json({
                mensagem: 'Dados inválidos',
                erros: error.errors
            });
        }
        console.error(error);
        return res.status(500).json({ mensagem: 'Erro ao cadastrar usuário' });
    }
});

// Atualizar usuário
router.put('/:id', async (req, res) => {
    const schema = z.object({
        nome: z.string().min(3).optional(),
        email: z.string().email().optional(),
        senha: z.string().min(6).optional()
    });

    try {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            return res.status(400).json({ mensagem: 'ID inválido' });
        }

        const data = schema.parse(req.body);
        const updateData: any = { id };

        if (data.nome) updateData.nome = data.nome;
        if (data.email) updateData.email = data.email;
        if (data.senha) updateData.senha = await hash(data.senha, SALT_ROUNDS);

        const atualizado = await atualizarUsuario(updateData);
        if (!atualizado) {
            return res.status(404).json({ mensagem: 'Usuário não encontrado' });
        }

        const { senha: _, ...usuarioSemSenha } = atualizado;
        return res.json({ usuario: usuarioSemSenha });

    } catch (error) {
        if (error instanceof z.ZodError) {
            return res.status(400).json({
                mensagem: 'Dados inválidos',
                erros: error.errors
            });
        }
        console.error(error);
        return res.status(500).json({ mensagem: 'Erro ao atualizar usuário' });
    }
});

// Deletar usuário
router.delete('/:id', async (req, res) => {
    try {
        const id = parseInt(req.params.id);
        if (isNaN(id)) {
            return res.status(400).json({ mensagem: 'ID inválido' });
        }

        const deletado = await deletarUsuario(id);
        if (!deletado) {
            return res.status(404).json({ mensagem: 'Usuário não encontrado' });
        }

        return res.json({ mensagem: 'Usuário deletado com sucesso' });
    } catch (error) {
        console.error(error);
        return res.status(500).json({ mensagem: 'Erro ao deletar usuário' });
    }
});

export default router;