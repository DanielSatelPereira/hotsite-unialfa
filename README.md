
# 🎓 αEventos - Hotsite de Eventos Acadêmicos UniALFA

Sistema web simples desenvolvido durante o Hackathon UniALFA 2025, utilizando PHP, Node.js, Java e MySQL.

## ✅ Tecnologias Utilizadas

- **Frontend:** PHP puro (com Programação Orientada a Objetos), HTML, CSS customizado, Bootstrap 5, FontAwesome
- **Backend:** API RESTful com Node.js (TypeScript, Express, Knex, MySQL)
- **Desktop (Backoffice):** Java Swing com JDBC e MySQL
- **Banco de Dados:** MySQL
- **Versionamento:** Git + GitHub

## ✅ Estrutura de Pastas

```
📂 php
 ├─ index.php
 ├─ login.php
 ├─ cadastro.php
 ├─ public/
 │   ├─ assets/ (css, js, img)
 │   ├─ includes/ (header.php, footer.php, helpers.php)
 │   └─ views/ (detalhes.php, todos_eventos.php, inscrever.php, sobre.php, institucional.php, dashboard.php, erro404.php, erro403.php, erro500.php)
 └─ api/ (ApiHelper.php)

📂 node
 ├─ src/
 │   ├─ routes/ (eventos.ts, usuarios.ts, session.ts, inscricoes.ts, relatorios.ts)
 │   ├─ controllers/ (usuarioController.ts)
 │   ├─ models/ (usuarioModel.ts)
 │   └─ database/knex/ (index.ts)
 ├─ knexfile.js
 └─ server.ts

📂 java-app
 └─ src/ (CRUD Swing de Usuários via JDBC)

📂 banco-de-dados/
 ├─ schema.sql
 └─ Thunder Collection (para testes de API)

📂 docs/
 └─ LICENSE
```

## ✅ Funcionalidades Principais

| Funcionalidade | Status |
|---|---|
| Listagem de eventos por área | ✅ |
| Página de detalhes dos eventos | ✅ |
| Cadastro de usuário com RA pré-cadastrado | ✅ |
| Login de usuário | ✅ |
| Inscrição em evento | ✅ |
| Dashboard (Aluno: eventos inscritos / Admin: relatório por evento) | ✅ |
| Controle de erros (404, 403, 500) | ✅ |
| Consumo da API Node via PHP cURL | ✅ |
| Painel Java para cadastro/edição/exclusão de usuários | ✅ |

## ✅ Módulo Java - Backoffice de Usuários

Desenvolvido por **Jhonatan** e **Leonardo**.

### Funções do aplicativo Java:

- CRUD de usuários (Alunos, Palestrantes, Admins)
- Integração direta com o banco de dados MySQL via JDBC
- Estruturado com Programação Orientada a Objetos
- Interface feita com Java Swing
- Garante que os cadastros estejam prontos para serem utilizados via PHP e API Node

## ✅ Requisitos para Execução Local

### Banco de Dados:
1. Rodar o `schema.sql` disponível em `/banco-de-dados/`
2. Ajustar conexão no `knexfile.js` (Node) e no Java (JDBC)

### Node API:
```bash
npm install
npm run dev
```
(Roda na porta 3001)

### PHP Frontend:
Executar no XAMPP/WAMP (Apache)

### Java CRUD:
Importar como projeto Java padrão e rodar via IDE (ex: NetBeans, Eclipse)

## ✅ Testes de API:

Usar Thunder Client (collection incluída na pasta `/banco-de-dados/`)

## ✅ Membros da Equipe αEventos:

| Nome | Área |
|---|---|
| Daniel Satel Pereira | Frontend, UX, Integração PHP |
| Alexandre | UX |
| Gabrielle | API Node.js |
| Jhonatan | Java (Backoffice) |
| Leonardo | Java (Backoffice) |

## ✅ Observações Finais:

- Projeto limitado a tecnologias básicas conforme regras do Hackathon.
- Backend de verdade ficou centralizado no Node.js.
- Java ficou exclusivo para o CRUD de usuários.
- PHP focado apenas como frontend visual consumindo a API.

---

Projeto feito com dedicação durante o Hackathon UniALFA 2025 🚀.
