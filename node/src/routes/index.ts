import { Router } from "express"
import session from "./session"
import usuarios from "./usuario"
import certificados from "./certificados"
import cursos from "./cursos"

const routes = Router()

routes.use('/session', session)
routes.use('/usuarios', usuarios)
routes.use('/certificados', certificados)
routes.use('/cursos', cursos)

export default routes