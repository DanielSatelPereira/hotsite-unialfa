import { Router } from "express"
import session from "./session"
import usuario from "./usuario"
import certificados from "./certificados"
import relatorios from "./relatorios"
import eventos from './eventos';


const routes = Router()

routes.use('/session', session)
routes.use('/usuario', usuario)
routes.use('/certificados', certificados)
routes.use('/relatorios', relatorios)
routes.use('/eventos', eventos);

export default routes