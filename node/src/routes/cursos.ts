import express, { Request, Response } from 'express';
import * as CursoService from '../services/cursosService';

const router = express.Router()

router.get('/', async (_: Request, res: Response) => {
    const cursos = await CursoService.listarTodos();
    res.json(cursos);
});


export default router