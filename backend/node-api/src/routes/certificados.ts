import { Router } from 'express'
import { certificadoController } from '../controllers/certificadoController'

const router = Router()

router.get('/', (req, res) => certificadoController.listar(req, res));
router.post('/', (req, res) => certificadoController.criar(req, res));
router.delete('/', (req, res) => certificadoController.deletar(req, res));

export default router