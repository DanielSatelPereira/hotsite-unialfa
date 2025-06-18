import knex from '../database/knex'
import { Inscricao } from '../models/inscricaoModel'

export interface Certificado {
  id?: number
  idInscricao: number
}

export const certificadoModel = {

    async listarPorInscricao(idInscricao: number) {
        return knex<Certificado>('certificados').where('idInscricao', idInscricao);
    },

    async buscarInscricaoPorId(idInscricao: number) {
        return knex<Inscricao>('inscricoes').where({ id: idInscricao }).first();
    },

    async buscarPorId(id: number) {
        return knex<Certificado>('certificados').where({ id }).first()
    },

    async inserir(certificado: Certificado) {
        const [id] = await knex<Certificado>('certificados').insert({ ...certificado})
        return id
    },

    async deletarPorInscricaoId(idInscricao: number) {
        return knex<Certificado>('certificados').where({ idInscricao }).del()
    }
}