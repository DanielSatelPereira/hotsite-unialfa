import { Router } from 'express';
import knex from '../database/knex';
import { formatResponse } from '../helpers/responseHelper';

const router = Router();

/**
 * Rota para dados do header
 * Retorna:
 * - Itens do menu ativos e ordenados
 * - Metadados do site
 */
router.get('/header', async (_, res) => {
    try {
        // Busca itens de menu ativos ordenados
        const menuItens = await knex('menu_itens')
            .where({ ativo: true })
            .orderBy('ordem', 'asc')
            .select(['id', 'texto', 'url', 'ordem']);

        // Busca configurações do site
        const configs = await knex('configuracoes_site')
            .first(['meta_descricao']);

        res.json(formatResponse(true, {
            menu: menuItens,
            meta: {
                description: configs?.meta_descricao || 'Plataforma de eventos acadêmicos da UniALFA'
            }
        }));

    } catch (error) {
        console.error('Erro ao buscar dados do header:', error);
        res.status(500).json(formatResponse(false, null, 'Erro ao carregar dados do cabeçalho'));
    }
});

/**
 * Rota para dados do footer
 * Retorna:
 * - Informações de contato
 * - Redes sociais ativas
 * - Links úteis para o footer
 * - Copyright e outros metadados
 */
router.get('/footer', async (_, res) => {
    try {
        // Executa todas as consultas em paralelo para melhor performance
        const [configs, redesSociais, linksUteis] = await Promise.all([
            // Configurações básicas
            knex('configuracoes_site')
                .first([
                    'footer_descricao as descricao',
                    'endereco',
                    'telefone',
                    'email_contato as email',
                    'copyright',
                    'site_url'
                ]),

            // Redes sociais ativas e ordenadas
            knex('redes_sociais')
                .where({ ativo: true })
                .orderBy('ordem', 'asc')
                .select(['nome', 'url', 'icone']),

            // Links para o footer
            knex('links_uteis')
                .where({ mostrar_footer: true })
                .orderBy('ordem', 'asc')
                .select(['texto', 'url'])
        ]);

        res.json(formatResponse(true, {
            about: configs?.descricao,
            contact: {
                address: configs?.endereco,
                phone: configs?.telefone,
                email: configs?.email
            },
            social: redesSociais,
            links: linksUteis,
            legal: {
                copyright: configs?.copyright,
                siteUrl: configs?.site_url
            }
        }));

    } catch (error) {
        console.error('Erro ao buscar dados do footer:', error);
        res.status(500).json(formatResponse(false, null, 'Erro ao carregar dados do rodapé'));
    }
});

/**
 * Rota para dados da página inicial
 * Retorna:
 * - Eventos em destaque
 * - Cursos disponíveis
 * - Banner promocional
 */
router.get('/home', async (_, res) => {
    try {
        const [destaques, cursos] = await Promise.all([
            // Eventos em destaque (próximos 3 eventos)
            knex('eventos')
                .where('data', '>=', knex.raw('CURDATE()'))
                .orderBy('data', 'asc')
                .limit(3)
                .select([
                    'id',
                    'titulo',
                    'descricao',
                    'data',
                    'hora',
                    'local'
                ]),

            // Todos os cursos
            knex('cursos')
                .select(['id', 'nome'])
        ]);

        res.json(formatResponse(true, {
            highlights: destaques.map(evento => ({
                ...evento,
                date: evento.data,
                time: evento.hora
            })),
            courses: cursos
        }));

    } catch (error) {
        console.error('Erro ao buscar dados da home:', error);
        res.status(500).json(formatResponse(false, null, 'Erro ao carregar dados da página inicial'));
    }
});

export default router;