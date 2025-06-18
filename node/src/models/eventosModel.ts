import knex from '../database/knex';

export const EventosModel = {
    async listarTodos() {
        return knex('eventos').select('*');
    },

    async buscarPorId(id: number) {
        return knex('eventos').where({ id }).first();
    },

    async buscarPorArea(area: string) {
        return knex('eventos')
            .join('cursos', 'eventos.idCurso', '=', 'cursos.id')
            .where('cursos.nome', 'like', `%${area}%`)
            .select(
                'eventos.id',
                'eventos.titulo',
                'eventos.descricao',
                'eventos.data',
                'eventos.hora',
                'eventos.local',
                'eventos.imagem'
            );
    }
};
