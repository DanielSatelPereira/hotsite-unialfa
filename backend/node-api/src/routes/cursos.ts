import { Router } from 'express'
import { cursoController } from '../controllers/cursoController'

const router = Router()

router.get('/', (req, res) => cursoController.listar(req, res));

export default router