# to-do-list
📌 Descrição do Projeto
Este projeto consiste em uma aplicação web de lista de tarefas (To-Do List), desenvolvida em grupo como atividade acadêmica. O objetivo principal é praticar conceitos de desenvolvimento web utilizando HTML, CSS com Bootstrap, PHP e MySQL. A aplicação permite ao usuário adicionar, editar, remover e marcar tarefas como concluídas, com uma interface intuitiva e responsiva.

🛠 Tecnologias Utilizadas
HTML – Estrutura da página

CSS / Bootstrap – Estilização e responsividade

PHP – Lógica de backend

MySQL – Banco de dados relacional

Git / GitHub – Versionamento e colaboração

⚙ Funcionalidades
Adicionar novas tarefas

Editar tarefas existentes

Excluir tarefas

Marcar tarefas como concluídas

Layout adaptável para diferentes tamanhos de tela (responsivo)

🧩 Estrutura do Banco de Dados
Antes de rodar o projeto, é necessário criar o banco de dados todo_list e a tabela tasks. Para isso, utilize o seguinte script SQL no phpMyAdmin ou outro gerenciador MySQL:

sql
Copiar
Editar
DROP DATABASE IF EXISTS todo_list;
CREATE DATABASE todo_list;
USE todo_list;

CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    description VARCHAR(200),
    status ENUM('pendente', 'em_progresso', 'completado') DEFAULT 'pendente'
);
Importante: certifique-se de que seu arquivo PHP está conectado corretamente ao banco (verifique as credenciais no arquivo de conexão).


🚀 Como Rodar o Projeto Localmente
Pré-requisitos:

Ter o XAMPP instalado (ou outro servidor local que suporte PHP e MySQL)

Ter o Git instalado para clonar o projeto

Clonar o repositório:
No terminal: git clone https://github.com/fabisussuarana/to-do-list.git

Copie ou mova a pasta clonada para: C:/xampp/htdocs/to-do-list

Criar o banco de dados:
Acesse o phpMyAdmin: http://localhost/phpmyadmin

Execute o script SQL da seção anterior para criar o banco todo_list e a tabela tasks

Executar o servidor:

No XAMPP, inicie o Apache e o MySQL

Acesse no navegador: http://localhost/to-do-list/

👥 Equipe de Desenvolvimento
O projeto foi desenvolvido por quatro integrantes, cada um contribuindo com:

Estrutura semântica em HTML

Estilização com CSS e Bootstrap

Programação em PHP e integração com MySQL

Organização do Git, resolução de conflitos e testes funcionais


📎 Repositório: https://github.com/fabisussuarana/to-do-list 
