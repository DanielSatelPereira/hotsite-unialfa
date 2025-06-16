import { Router } from 'express';
import cursos from './cursos';
import eventos from './eventos';
import usuario from './usuario';
import certificados from './certificados';
import session from './session';

const routes = Router();

routes.use('/cursos', cursos);
routes.use('/eventos', eventos);
routes.use('/usuario', usuario);
routes.use('/certificados', certificados);
routes.use('/session', session);


export default routes