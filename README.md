# 💼 EmpregaMur

**EmpregaMur** é uma plataforma web voltada para a conexão entre **empresas** e **candidatos** em busca de oportunidades de emprego. O sistema permite que usuários cadastrem seus currículos e experiências, enquanto empresas podem divulgar vagas e gerenciar seus processos seletivos.

Desenvolvido como parte do curso de Análise e Desenvolvimento de Sistemas, o projeto utiliza tecnologias amplamente aplicadas no mercado, com foco na prática e organização de código.

---

## 🚀 Funcionalidades

### 👤 Para Candidatos (Pessoa Física)
- Cadastro e edição de currículo
- Adição de:
  - Escolaridade
  - Qualificações
  - Experiências profissionais
- Visualização de perfil
- Foto de perfil com fallback padrão
- Interface amigável com alertas personalizados (SweetAlert2)

### 🏢 Para Empresas (Pessoa Jurídica)
- Cadastro e gerenciamento do perfil da empresa
- Registro de vagas de emprego
- Exibição das vagas abertas com edição e exclusão
- Upload de imagem de perfil
- Incentivo ao preenchimento completo do cadastro

---

## 🛠️ Tecnologias Utilizadas

| Camada | Tecnologias |
|--------|-------------|
| **Backend** | PHP (com microframework **AtomPHP**, desenvolvido em sala de aula) |
| **Frontend** | HTML, CSS (via Bootstrap 5), JavaScript |
| **Banco de Dados** | MySQL |
| **Servidor local** | WAMP (Windows, Apache, MySQL, PHP) |

---

## 🗂 Estrutura do Projeto

- `app/`: arquivos principais do sistema (controllers, models, views)
- `public/`: arquivos públicos (imagens, CSS, JS)
- `core`: arquivos relacionados ao microframework 
