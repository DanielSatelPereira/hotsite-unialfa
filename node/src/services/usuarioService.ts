import knex from '../database/knex';
import { compare, hash } from 'bcrypt';
import { z } from 'zod';

const SALT_ROUNDS = 8;

// Interface para TypeScript
interface Usuario {
    id?: number;
    nome: string;
    email: string;
    senha: string;
}

export async function autenticar(email: string, senha: string) {
    // ... implementação existente
}

export async function buscarDummyData() {
    // ... implementação existente
}

export async function listarUsuarios() {
    return await knex('usuarios').select('*').orderBy('nome');
}

export async function cadastrarUsuario(dados: Usuario) {
    const hashedSenha = await hash(dados.senha, SALT_ROUNDS);
    const [id] = await knex('usuarios').insert({
        ...dados,
        senha: hashedSenha
    });
    return await knex('usuarios').where({ id }).first();
}

export async function atualizarUsuario(dados: Partial<Usuario> & { id: number }) {
    if (dados.senha) {
        dados.senha = await hash(dados.senha, SALT_ROUNDS);
    }

    await knex('usuarios')
        .where({ id: dados.id })
        .update(dados);

    return await knex('usuarios').where({ id: dados.id }).first();
}

export async function deletarUsuario(id: number) {
    return await knex('usuarios').where({ id }).del();
}