import { Router } from "express"
import session from "./session"
import usuario from "./usuario"
import relatorios from "./relatorios"
import eventos from './eventos';
import certificados from './certificados';
import { eventoController } from "../controllers/eventosController";

const routes = Router()

routes.use('/session', session)
routes.use('/usuario', usuario)
routes.use('/eventos', eventos);
routes.use('/relatorios', relatorios)
routes.use('/certificados', certificados);
routes.get('/eventos/:id', eventoController.listarEvento)

export default routes