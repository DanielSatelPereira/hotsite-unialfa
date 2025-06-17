import { Router } from "express"
import session from "./session"
import usuarios from "./usuario"
import certificados from "./certificados"
import cursos from "./cursos"
import eventos from "./eventos"
import inscricoes from "./inscricoes"

const routes  = Router()

routes.use('/session', session)
routes.use('/usuarios', usuarios)
routes.use('/certificados', certificados)
routes.use('/cursos', cursos)
routes.use('/eventos', eventos)
routes.use('/inscricoes', inscricoes)

export default routes