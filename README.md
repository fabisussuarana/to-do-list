# to-do-list
Projeto to do list feito para o trabalho da matéria de desenvolvimento web
Este projeto consiste em uma aplicação web para gerenciamento de atividades, desenvolvida com foco em simplicidade, usabilidade e clareza visual. A aplicação permite aos usuários adicionar, visualizar, filtrar, atualizar e excluir tarefas, categorizando-as por status (pendente, em andamento e concluído).

- Objetivo
O objetivo do projeto é proporcionar uma ferramenta prática e intuitiva para organização de tarefas diárias. O sistema foi desenvolvido utilizando PHP para a lógica de backend, MySQL para persistência dos dados e Bootstrap 5 para o design responsivo e moderno.

- Funcionalidades
Cadastro de tarefas: o usuário pode inserir título, descrição e status da tarefa.

Listagem de tarefas: todas as tarefas cadastradas são exibidas em lista, com destaque visual conforme o status.

Filtro de tarefas: é possível buscar tarefas por palavra-chave ou por status.

Alteração de status: permite marcar tarefas como concluídas.

Exclusão de tarefas: o usuário pode remover tarefas individualmente.

Interface amigável e responsiva: layout otimizado para diferentes tamanhos de tela.

(Em desenvolvimento): funcionalidade de edição de tarefas.

- Linguagens Utilizadas
PHP – linguagem de programação backend responsável pelo processamento dos dados.

MySQL – banco de dados relacional utilizado para armazenamento das tarefas.

Bootstrap  – framework CSS para construção da interface responsiva.

Bootstrap Icons – biblioteca de ícones para enriquecer a interface.

- Estrutura de Diretórios
graphql
Copiar
Editar
TO_DO_LIST_MAIN
├── assets/
│   └── style.css                  # Arquivo de estilo customizado
|   |__ seta.pgn                   # Imagem seta
├── metodos/
│   ├── conexao.php                # Script de conexão com o banco de dados
│   ├── insertTask.php             # Script para inserção de nova tarefa
│   ├── deleteTask.php             # Script para exclusão de tarefa
│   ├── completeTask.php           # Script para marcar tarefa como concluída
|    ├── todoList.php              
🔧 Requisitos
Para executar o projeto localmente, é necessário ter os seguintes componentes instalados:

Servidor Web (ex: Apache via XAMPP, WAMP, Laragon ou similar)

PHP 7.4+

MySQL 5.7+

Navegador (ex: Chrome, Firefox)

-Como Executar o Projeto
Clone ou baixe este repositório:

bash
Copiar -> git clone https://github.com/seu-usuario/nome-do-repositorio.git

Configure o banco de dados:

Crie um banco de dados no MySQL com o nome de sua escolha.

Execute o script TO_DO_LIST_MAIN

-Abra o arquivo metodos/conexao.php e substitua os dados de conexão de acordo com as configurações do seu ambiente local:
$conn = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');

localhost: endereço do servidor MySQL (padrão: localhost)

usuario: nome de usuário do MySQL (padrão: root)

senha: senha do MySQL (padrão em muitos ambientes locais é vazia)

nome_do_banco: o nome do banco de dados criado no passo anterior

-Coloque os arquivos no servidor local
Copie todos os arquivos do projeto para o diretório raiz do seu servidor local:

Em servidores como o XAMPP, esse diretório costuma ser: C:/xampp/htdocs/

Em WAMP: C:/wamp/www/

Em Laragon: C:/laragon/www/

-Acesse a aplicação via navegador
Com o servidor ativo (Apache/MySQL), abra o navegador e acesse a URL correspondente:
http://localhost/lista-tarefas/

