import knex from '../database/knex'

export interface Curso {
  id?: number
  nome: string
}

export const cursoModel = {
    async listar() {
        return knex<Curso>('cursos')
    },
    async buscarPorId(id: number) {
        return knex<Curso>('cursos').where({ id }).first()
    },
}