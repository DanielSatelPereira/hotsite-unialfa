import knex from '../database/knex';

// Tipo para os cursos
interface Curso {
    id: number;
    nome: string;
    // adicione outros campos quando existirem, como descrição, etc.
}

export async function buscarPorId(id: number): Promise<Curso | null> {
    try {
        const curso = await knex<Curso>('cursos')
            .where({ id })
            .first();

        return curso || null;
    } catch (error) {
        console.error('Erro ao buscar curso por ID:', error);
        return null;
    }
}

export async function listarTodos(): Promise<Curso[]> {
    try {
        return await knex<Curso>('cursos')
            .select('*')
            .orderBy('nome');
    } catch (error) {
        console.error('Erro ao listar todos os cursos:', error);
        return [];
    }
}

export async function getNomeCurso(id: number): Promise<string> {
    try {
        const result = await knex<Curso>('cursos')
            .select('nome')
            .where({ id })
            .first();

        return result?.nome ?? 'Área Desconhecida';
    } catch (error) {
        console.error('Erro ao buscar nome do curso:', error);
        return 'Área Desconhecida';
    }
}
