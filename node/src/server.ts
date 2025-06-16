import express from 'express';
import cors from 'cors';
import routes from './routes';
import usuarioRouter from './routes/usuario';
import inscricaoRouter from './routes/inscricao';

const app = express();
const PORT = 3001;

// Middlewares globais
app.use(cors({
    origin: 'http://localhost:80', // Ou o URL do seu PHP
    methods: ['GET', 'POST', 'PUT', 'DELETE'],
    allowedHeaders: ['Content-Type']
}));
app.use(express.json());

// Rotas da API com prefixo /api
app.use('/api/usuarios', usuarioRouter);
app.use('/api/inscricoes', inscricaoRouter);

// Rotas existentes (sem prefixo /api)
app.use(routes);

// Rota raiz (opcional)
app.get('/', (_, res) => {
    res.send('API do Projeto UniAlfa - UniAlfa Events');
});

app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});