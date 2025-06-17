import knex from '../database/knex'
import { Inscricao } from '../models/inscricaoModel'

export interface Evento {
  id?: number
  titulo: string
  descricao: string
  data: string
  hora: string
  local: string
  idCurso: number
  idUsuarios: number
}

export const eventoModel = {

    async listar() {
        return knex<Evento>('eventos')
    },

    async listarPorCurso(idCurso: number) {
        return knex<Evento>('eventos').where('idCurso', idCurso);
    },

    async buscarInscricaoPorId(idInscricao: number) {
        return knex<Inscricao>('inscricoes').where({ id: idInscricao }).first();
    },

    async buscarPorId(id: number) {
        return knex<Evento>('eventos').where({ id }).first()
    },

}