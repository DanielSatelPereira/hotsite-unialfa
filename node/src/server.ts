import express from 'express';
import cors from 'cors';
import routes from './routes';
import usuarioRouter from './routes/usuario';
import inscricaoRouter from './routes/inscricao';
import siteRouter from './routes/site';

const app = express();
const PORT = 3001;

// Middlewares
app.use(cors({
    origin: ['http://localhost', 'http://localhost:80', 'http://localhost:3001'],
    methods: ['GET', 'POST', 'PUT', 'DELETE'],
    allowedHeaders: ['Content-Type']
}));
app.use(express.json());

// Rotas com prefixo /api
app.use('/api/usuarios', usuarioRouter);
app.use('/api/inscricoes', inscricaoRouter);
app.use('/api/site', siteRouter);

// Outras rotas 
app.use(routes);

// Rota raiz (debug/teste)
app.get('/', (_, res) => {
    res.send('API do Projeto UniAlfa - UniAlfa Events');
});

// Inicialização
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
