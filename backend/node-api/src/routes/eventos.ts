import { Router } from 'express'
import { eventoController } from '../controllers/eventoController'

const router = Router()

router.get('/', (req, res) => eventoController.listar(req, res));

export default router