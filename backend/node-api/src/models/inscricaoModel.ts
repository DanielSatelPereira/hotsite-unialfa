import knex from '../database/knex'

export interface Inscricao {
  id?: number,
  raUsuario: number,
  idEvento: number
}

export const inscricaoModel = {
  async listar() {
    return knex<Inscricao>('inscricoes')
  },

  async buscarPorId(id: number) {
    return knex<Inscricao>('inscricao').where({ id }).first()
  },

  async buscarPorRA(raUsuario: number) {
    return knex<Inscricao>('inscricoes').where({ raUsuario }).first()
  },

  async buscarPorEvento(idEvento: number) {
    return knex<Inscricao>('inscricoes').where({ idEvento }).first()
  },

  async inserir(inscricao: Inscricao) {
    const [id] = await knex<Inscricao>('inscricoes').insert({ ...inscricao })
    return id
  },

  async atualizar(inscricao: Inscricao) {
    return knex<Inscricao>('inscricoes').where({ id: inscricao.id }).update(inscricao)
  },

  async deletar(id: number) {
    return knex<Inscricao>('inscricoes').where({ id }).del()
  }
}