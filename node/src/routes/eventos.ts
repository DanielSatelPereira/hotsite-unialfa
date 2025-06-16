import { Router, Request, Response } from 'express';
import * as EventoService from '../services/eventosService';

const router = Router();

router.get('/', async (_: Request, res: Response) => {
    const eventos = await EventoService.listarTodos();
    res.json(eventos);
});


export default router;
