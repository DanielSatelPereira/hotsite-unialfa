// src/services/eventosService.ts
import knex from '../database/knex';

export async function buscarPorId(id: number) {
    try {
        const evento = await knex('eventos as e')
            .leftJoin('cursos as c', 'e.idCurso', 'c.id')
            .leftJoin('usuarios as u', 'e.idUsuarios', 'u.id')
            .select(
                'e.*',
                'c.nome as nome_curso',
                'u.nome as nome_organizador'
            )
            .where('e.id', id)
            .first();

        return evento || null;
    } catch (error) {
        console.error('Erro ao buscar evento por ID:', error);
        return null;
    }
}

export async function listarPorCurso(idCurso: number, limit = 10, offset = 0) {
    try {
        return await knex('eventos as e')
            .join('usuarios as u', 'e.idUsuarios', 'u.id')
            .select('e.*', 'u.nome as nome_organizador')
            .where('e.idCurso', idCurso)
            .orderBy([{ column: 'e.data', order: 'desc' }, { column: 'e.hora', order: 'desc' }])
            .limit(limit)
            .offset(offset);
    } catch (error) {
        console.error('Erro ao listar eventos por curso:', error);
        return [];
    }
}

export async function buscarPorTermo(termo: string) {
    try {
        return await knex('eventos as e')
            .leftJoin('cursos as c', 'e.idCurso', 'c.id')
            .select('e.*', 'c.nome as nome_curso')
            .whereILike('e.titulo', `%${termo}%`)
            .orWhereILike('e.descricao', `%${termo}%`)
            .orderBy('e.data', 'desc');
    } catch (error) {
        console.error('Erro ao buscar por termo:', error);
        return [];
    }
}

export async function listarTodos() {
    try {
        return await knex('eventos as e')
            .leftJoin('cursos as c', 'e.idCurso', 'c.id')
            .select('e.*', 'c.nome as nome_curso')
            .orderBy('e.data', 'desc');
    } catch (error) {
        console.error('Erro ao listar todos os eventos:', error);
        return [];
    }
}
