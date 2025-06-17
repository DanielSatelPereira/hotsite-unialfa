# αEventos - Hotsite de Eventos Acadêmicos UniALFA

Sistema desenvolvido por alunos da UniALFA durante o **Hackathon 2025**, com foco em Programação Orientada a Objetos (POO), UX e integração de tecnologias.

---

## 🎯 Objetivo

Centralizar a divulgação de eventos acadêmicos da UniALFA, permitindo:

- Visualização de eventos por área
- Detalhes de cada evento
- Inscrição online (em desenvolvimento)
- Integração entre frontend, API backend e administração Java

---

## 🏗 Arquitetura do Projeto

| Camada              | Tecnologia                 | Função                                       |
| ------------------- | -------------------------- | -------------------------------------------- |
| **Frontend Visual** | PHP puro + Bootstrap       | Exibição de páginas web e consumo da API     |
| **API Backend**     | Node.js com Express + Knex | Regras de negócio e acesso ao banco de dados |
| **Administração**   | Java (Swing + JDBC)        | Cadastro e manutenção de dados (CRUD)        |
| **Banco de Dados**  | MySQL                      | Armazenamento relacional                     |

---

## 🚀 Como Executar Localmente

1. **Clone o projeto:**

```bash
git clone https://github.com/equipe/hotsite-unialfa.git
cd hotsite-unialfa
```

2. **Configurar Banco de Dados:**

- Importar o SQL localizado em:  
  `/banco-de-dados/schema.sql`

3. **Configurar o PHP (Frontend Visual):**

- Copiar a pasta `/php/` para o diretório `htdocs` do XAMPP.
- Iniciar o Apache e o MySQL.

4. **Configurar a API Node.js:**

```bash
cd node
npm install
npm run dev
```

> A API ficará disponível em:  
> `http://localhost:3000`

5. **Configurar o Java:**

- Abrir o projeto da pasta `/java-app/` na IDE Java (NetBeans, IntelliJ ou Eclipse).
- Configurar a conexão com o mesmo banco MySQL.

---

## ✅ Estado Atual

| Parte           | Status                |
| --------------- | --------------------- |
| PHP Frontend    | 🟢 Quase Finalizado   |
| Node API        | 🟡 Em Finalização     |
| Java Backoffice | 🟡 Em desenvolvimento |
| Inscrições      | 🔴 Em desenvolvimento |

---

## 👨‍💻 Equipe de Desenvolvimento

- **Daniel & Alexandre:** UX, Frontend PHP, Bootstrap
- **Gabrielle:** API Backend (Node.js + Knex)
- **Jhonatan, Leonardo e Alexandre:** Sistema Java (CRUD e Administração)

---

## 📅 Próximas Entregas

- Finalizar consumo da API no PHP
- Concluir rotas REST na API Node.js
- Completar o CRUD no Java
- Implementar o fluxo de inscrições online
- Se houver tempo: gerar certificados de participação

---

> "Feito por alunos, para alunos!"  
> Hackathon UniALFA 2025
