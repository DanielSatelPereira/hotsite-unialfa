import { Router } from "express"
import session from "./session"
import palestrantes from "./palestrante"
import certificados from "./certificados"

const routes  = Router()

routes.use('/session', session)
routes.use('/palestrante', palestrantes)
routes.use('/certificados', certificados)

export default routes