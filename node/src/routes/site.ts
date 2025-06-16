import { Router } from 'express';
import knex from '../database/knex';

const router = Router();

// Rota para dados do header
router.get('/header', async (_, res) => {
    try {
        const menuItens = await knex('menu_itens').select('*');
        res.json({
            sucesso: true,
            menu: menuItens,
            meta_descricao: "Plataforma de eventos acadêmicos da UniALFA"
        });
    } catch (error) {
        res.status(500).json({ sucesso: false });
    }
});

// Rota para dados do footer
router.get('/footer', async (_, res) => {
    try {
        const [config] = await knex('configuracoes').select('*').limit(1);
        const redesSociais = await knex('redes_sociais').select('*');

        res.json({
            sucesso: true,
            descricao: config.descricao_footer,
            endereco: config.endereco,
            telefone: config.telefone,
            email: config.email_contato,
            redes_sociais: redesSociais,
            copyright: config.copyright_texto,
            site_url: config.site_url
        });
    } catch (error) {
        res.status(500).json({ sucesso: false });
    }
});

export default router;