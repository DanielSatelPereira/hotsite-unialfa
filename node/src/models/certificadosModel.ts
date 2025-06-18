import knex from '../database/knex';

export const CertificadosModel = {
    async listar() {
        return knex('certificados')
            .join('inscricoes', 'certificados.idInscricao', '=', 'inscricoes.id')
            .join('eventos', 'inscricoes.idEvento', '=', 'eventos.id')
            .select(
                'certificados.id',
                'certificados.idInscricao',
                'eventos.titulo as evento'
            );
    },

    async deletarPorInscricao(idInscricao: number) {
        return knex('certificados').where({ idInscricao }).del();
    }
};
