# 🎓 Sistema de Gestão Escolar (CRUD & Controle de Acesso)

Este é um sistema robusto de gestão escolar desenvolvido para gerenciar alunos, cursos e matrículas. A aplicação conta com um sistema completo de permissões e restrições de acesso baseadas em níveis de usuário, além de funcionalidades avançadas como geração de relatórios em PDF e upload de arquivos.

---

## 🚀 Funcionalidades Principais

- **Controle de Acesso Multinível (RBAC):** Restrição de rotas e visualizações baseadas no papel (*role*) do usuário autenticado:
  - **Super Admin:** Controle total do sistema, configurações globais e gerenciamento de administradores.
  - **Admin:** Gerenciamento completo de alunos, professores e cursos.
  - **Professor:** Acesso a pautas, notas e turmas vinculadas.
  - **Aluno:** Visualização de perfil, cursos matriculados e histórico.
- **CRUD Completo:** Cadastro, leitura, edição e exclusão de:
  - **Alunos:** Incluindo upload de foto de perfil e definição de papéis.
  - **Cursos:** Controle de listagem, preços e gerenciamento de aulas.
- **Emissão de Relatórios:** Geração dinâmica de arquivos **PDF** para listagens e dados do sistema (otimizando a exportação de dados).
- **Filtros e Buscas Dinâmicas:** Sistema de pesquisa avançada por nome, e-mail e outros critérios diretamente na listagem de registros.
- **Autenticação Segura:** Tela de login customizada com proteção de rotas e recuperação de senha.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** PHP (Framework **Laravel**)
- **Frontend:** Blade Templates, HTML5, CSS3, JavaScript (Layout responsivo com Sidebar de navegação)
- **Geração de PDF:** Dompdf / Laravel-Dompdf *(ajuste se usou outra biblioteca)*
- **Banco de Dados:** MySQL
- **Autenticação:** Laravel Breeze / Fortify / Autenticação Customizada *(ajuste conforme o que utilizou)*

---

## 📸 Demonstração do Sistema

### 1. Tela de Login / Área Restrita
Portal de entrada seguro com validação de credenciais e controle de sessões.
<img width="1919" height="969" alt="Captura de tela 2026-06-16 161458" src="https://github.com/user-attachments/assets/a004c39a-ccfe-43da-95c5-cd9615a4adee" />


### 2. Painel de Controle (Listagem de Alunos)
Dashboard administrativo exibindo a tabela de dados, ações de CRUD (Visualizar, Editar, Apagar), sistema de busca e botões para **Gerar PDF**.
<img width="1919" height="968" alt="Captura de tela 2026-06-16 162415" src="https://github.com/user-attachments/assets/b7bf5df3-0e41-4850-b233-c9dbd7b1db4e" />


### 3. Formulário de Cadastro (com Upload de Imagem)
Interface de cadastro de aluno contendo campos estruturados, validação de senhas, atribuição de papéis e input para foto de perfil.
<img width="1916" height="968" alt="Captura de tela 2026-06-16 161757" src="https://github.com/user-attachments/assets/efb0299c-a1a9-4caf-9589-e551a151980f" />


### 4. Gestão de Cursos
Módulo dedicado ao gerenciamento de turmas, exibição de preços e vinculação de aulas.
<img width="1919" height="972" alt="Captura de tela 2026-06-16 161543" src="https://github.com/user-attachments/assets/1699ddd7-7b24-4eb0-88be-c4bf5c4f79ad" />
<img width="1919" height="968" alt="Captura de tela 2026-06-16 161618" src="https://github.com/user-attachments/assets/1dfa3e1b-27d9-41a1-adf3-2b3c41fc1c58" />


---

## 🔧 Como Executar o Projeto Localmente

1. Clone o repositório:
   ```bash
   git clone [https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git](https://github.com/SEU_USUARIO/NOME_DO_REPOSITORIO.git)
Acesse a pasta do projeto:

Bash
cd NOME_DO_REPOSITORIO
Instale as dependências:

Bash
composer install
Configure o arquivo .env:

Bash
cp .env.example .env
Abra o arquivo .env e configure a conexão com o seu banco de dados MySQL.

Gere a chave da aplicação:

Bash
php artisan key:generate
Rode as migrações e os Seeders (se houver dados de teste compartilhados):

Bash
php artisan migrate --seed
Inicie o servidor:

Bash
php artisan serve
Acesse no navegador: http://127.0.0.1:8000

👨‍💻 Autor
Desenvolvido por Miguel Caetano. Estudante de Análise e Desenvolvimento de Sistemas (ADS) no SENAI.
