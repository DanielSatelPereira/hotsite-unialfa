import routes from "./routes"
const express = require('express')

const PORT = 3001
const app = express()

app.use(express.json())
app.use(routes)

app.get('', (req, res) => {
    res.send('Oe  typescript')
})

app.listen(PORT, () => {
    console.log('Servidor iniciado na porta ' + PORT)
})