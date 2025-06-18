import knex from '../database/knex';

export const InscricoesModel = {
    async listarPorUsuario(ra: number) {
        return knex('inscricoes')
            .join('eventos', 'inscricoes.idEvento', '=', 'eventos.id')
            .where('inscricoes.raUsuarios', ra)
            .select(
                'inscricoes.id',
                'eventos.titulo as evento',
                'eventos.data',
                'eventos.hora',
                'eventos.local'
            );
    },

    async criar(ra: number, idEvento: number) {
        return knex('inscricoes').insert({ raUsuarios: ra, idEvento });
    },

    async deletar(id: number) {
        return knex('inscricoes').where({ id }).del();
    }
};
