import { Router } from 'express'
import { inscricaoController } from '../controllers/inscricaoController'

const router = Router()

router.get('/', (req, res) => inscricaoController.listar(req, res));
router.post('/', (req, res) => inscricaoController.criar(req, res));
router.put('/', (req, res) => inscricaoController.atualizar(req, res));
router.delete('/', (req, res) => inscricaoController.deletar(req, res));

export default router