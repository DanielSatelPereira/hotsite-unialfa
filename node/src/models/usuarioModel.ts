import knex from '../database/knex'
import { hash } from 'bcrypt'

export interface Usuario {
  id?: number
  ra: number
  nome: string
  email: string
  senha: string
  tipo: number
}

export const UsuarioModel = {
  async listar() {
    return knex<Usuario>('usuarios')
  },

  async buscarPorEmail(email: string) {
    return knex<Usuario>('usuarios').where({ email }).first()
  },

  async buscarPorId(id: number) {
    return knex<Usuario>('usuarios').where({ id }).first()
  },

  async atualizarPorRa(ra: number, usuario: Partial<Usuario>) {
    if (usuario.senha) {
      usuario.senha = await hash(usuario.senha, 8)
    }
    return knex<Usuario>('usuarios').where({ ra }).update(usuario)
  },

  async atualizar(usuario: Usuario) {
    if (usuario.senha) {
      usuario.senha = await hash(usuario.senha, 8)
    }
    return knex<Usuario>('usuarios').where({ id: usuario.id }).update(usuario)
  },

  async deletar(id: number) {
    return knex<Usuario>('usuarios').where({ id }).del()
  }
}
