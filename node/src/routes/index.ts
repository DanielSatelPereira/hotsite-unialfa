import { Router } from "express"
import session from "./session"
import usuario from "./usuario"
import certificados from "./certificados"

const routes = Router()

routes.use('/session', session)
routes.use('/usuario', usuario)
routes.use('/certificados', certificados)

export default routes