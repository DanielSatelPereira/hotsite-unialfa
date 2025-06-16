import knex from '../database/knex';

export interface Inscricao {
    aluno_id: number;
    evento_id: number;
    data_inscricao?: Date;
}

export async function verificaInscricao(alunoId: number, eventoId: number): Promise<boolean> {
    try {
        const result = await knex('inscricoes')
            .where({
                aluno_id: alunoId,
                evento_id: eventoId
            })
            .count<Record<string, number>>('* as count')
            .first();

        return result ? result.count > 0 : false;
    } catch (error) {
        console.error('[ERRO verificação inscrição]', error);
        return false;
    }
}

export async function criarInscricao(alunoId: number, eventoId: number): Promise<boolean> {
    try {
        await knex('inscricoes').insert({
            aluno_id: alunoId,
            evento_id: eventoId,
            data_inscricao: knex.fn.now()
        });
        return true;
    } catch (error) {
        console.error('[ERRO criação inscrição]', error);
        return false;
    }
}

// Outras funções que você possa precisar
export async function listarInscricoesPorAluno(alunoId: number) {
    return await knex('inscricoes')
        .where('aluno_id', alunoId)
        .select('*');
}

export async function listarInscricoesPorEvento(eventoId: number) {
    return await knex('inscricoes')
        .where('evento_id', eventoId)
        .select('*');
}

export default {
    verificaInscricao,
    criarInscricao,
    listarInscricoesPorAluno,
    listarInscricoesPorEvento
};