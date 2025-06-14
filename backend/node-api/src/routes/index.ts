import { Router } from "express"
import session from "./session"
import usuarios from "./usuario"
import certificados from "./certificados"

const routes  = Router()

routes.use('/session', session)
routes.use('/usuarios', usuarios)
routes.use('/certificados', certificados)

export default routes