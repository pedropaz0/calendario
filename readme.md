Gerenciador de Tarefas estilo iOS (Full-Stack PHP)

Projeto desenvolvido para a disciplina de Codificação para Back-End.

## 📌 Temática
Aplicação web para organização de compromissos e tarefas diárias, com interface gráfica baseada no aplicativo de Calendário do iOS (iPhone).

## 🛠️ Divisão de Responsabilidades da Equipe
- **Bruno:**
  - Modelagem da base de dados (`schema.sql`)
  - Configuração de conexão PDO (`config/db.php`)
  - Estruturação HTML da interface (`index.php`)
  - Estilização CSS completa baseada no iOS (`assets/css/style.css`)

- **PL:**
  - Regras de negócio e rotas do CRUD em PHP (`acoes.php`)
  - Interatividade Front-End e validações em JS (`assets/js/main.js`)

## 📋 Requisitos Funcionais (RF)
- **RF01:** Permitir o cadastro de tarefas vinculadas a uma data específica.
- **RF02:** Exibir a listagem dinâmica de tarefas conforme a data selecionada no calendário.
- **RF03:** Permitir alterar o status da tarefa entre "pendente" e "concluída".
- **RF04:** Permitir a exclusão de tarefas cadastradas.

## ⚙️ Requisitos Não Funcionais (RNF)
- **RNF01:** Back-End processado estritamente do lado do servidor (PHP).
- **RNF02:** Persistência de dados segura utilizando instrução preparada (Prepared Statements - PDO).
- **RNF03:** Interface leve, intuitiva e responsiva adaptada a dispositivos móveis.
- **RNF04:** Separação profissional de responsabilidades (Código limpo com arquivos CSS e JS externos).'