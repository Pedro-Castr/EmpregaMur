/* Insert na tabela de cargos */
INSERT INTO cargo (descricao) VALUES
('Auxiliar Administrativo'),
('Analista de Sistemas'),
('Desenvolvedor Front-End'),
('Desenvolvedor Back-End'),
('Designer Gráfico'),
('Técnico de Suporte'),
('Atendente de Loja'),
('Estagiário de Marketing'),
('Gerente de Projetos'),
('Operador de Telemarketing'),
('Vendedor Interno'),
('Assistente Financeiro'),
('Motorista'),
('Recepcionista'),
('Auxiliar de Limpeza');

/* Insert na tabela de escolaridade */
INSERT INTO escolaridade (descricao) VALUES
('Ensino Fundamental Incompleto'),
('Ensino Fundamental Completo'),
('Ensino Médio Incompleto'),
('Ensino Médio Completo'),
('Ensino Técnico'),
('Ensino Superior Incompleto'),
('Ensino Superior Completo'),
('Pós-graduação'),
('Mestrado'),
('Doutorado');

/* Insert do usuário administrador */
INSERT INTO usuario (nome, login, senha, tipo) VALUES
("Administrador", "empregamurADM", "fasm@2025", "AD")

/* Insert do termo de uso padrão */
INSERT INTO termodeuso (textoTermo, statusRegistro, rascunho, usuario_id) VALUES
("Bem-vindo ao EmpregaMur! Ao usar nosso sistema, você concorda com estas regras:

1. Quem somos

O EmpregaMur é uma plataforma para conectar candidatos e empresas através de vagas de emprego.

2. Cadastro e segurança

Informe dados verdadeiros e mantenha sua senha segura.

Não crie contas falsas nem use a conta de outra pessoa.

3. Tipos de usuários

Candidatos: cadastram currículo, qualificações, experiência e posts.

Empresas: cadastram e gerenciam vagas e podem ver currículos de candidatos que se candidataram.

Visualização de perfis: todos podem ver nome, e-mail, telefone, cidade e posts. Dados do currículo só são visíveis para a empresa onde você se candidatou.

4. Conteúdos

Todos podem publicar posts com texto e imagens.

Conteúdos ofensivos ou ilegais não são permitidos e podem ser removidos.

5. Direitos sobre o sistema

O EmpregaMur e o que foi desenvolvido especificamente por nós (design, funcionalidades, marca) são de nossa propriedade.

Parte do sistema usa o framework AtomPHP, que é de terceiros e segue suas regras de licença.

Conteúdos que você cria (posts, fotos) continuam seus, mas nos dá permissão para exibi-los no sistema.

6. Privacidade

Coletamos informações de cadastro e currículos para funcionamento do sistema.

Seus dados pessoais só são compartilhados conforme descrito: perfis básicos visíveis a todos, currículos apenas para empresas onde você se candidatou.

7. Limites de responsabilidade

Não garantimos que vagas ou informações estejam completas ou corretas.

O EmpregaMur não se responsabiliza por perdas ou danos resultantes do uso da plataforma.

8. Alterações nos termos

Podemos atualizar o sistema ou estes termos a qualquer momento.

Você precisará aceitar os termos atualizados para continuar usando o sistema.

9. Encerramento de contas

Contas que violarem as regras podem ser suspensas ou encerradas.

Você pode encerrar sua conta, mas dados compartilhados podem permanecer visíveis conforme regras de privacidade.

10. Lei aplicável

Estes termos seguem a legislação brasileira.

Disputas serão resolvidas no foro da Comarca de Muriaé, Minas Gerais."
, 1, 2, 1)
