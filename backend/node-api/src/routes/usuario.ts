import { Router } from 'express'
import { usuarioController } from '../controllers/usuarioController'

const router = Router()

router.get('/', (req, res) => usuarioController.listar(req, res));
router.post('/', (req, res) => usuarioController.criar(req, res));
router.put('/', (req, res) => usuarioController.atualizar(req, res));
router.delete('/', (req, res) => usuarioController.deletar(req, res));

export default router