import { Router } from "express"
import session from "./session"
import palestrantes from "./palestrante"

const routes  = Router()

routes.use('/session', session)
routes.use('/palestrante', palestrantes)

export default routes