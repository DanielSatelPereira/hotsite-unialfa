import { Router } from 'express';
import { usuarioController } from '../controllers/usuarioController';

const router = Router();

router.get('/', usuarioController.listar);
router.post('/', usuarioController.criar);
router.put('/', usuarioController.atualizar);
router.delete('/', usuarioController.deletar);

export default router;
