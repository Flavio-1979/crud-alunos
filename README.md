# Projeto PHP + ReactJS

Backend

IDE utilizada: PhpStorm 2024

Pré-requisitos:
- Composer 2.7.9
- PHP versão 8.3.12 ou superior.
- MySQL Workbench

Extensões necessárias:
- intl
- mbstring
- json (enabled by default - don't turn it off)
- mysqlnd (para utilizar o MySQL)
- libcurl (para utilizar o HTTP\CURLRequest library)

Configuração do banco de dados:
- Acesse a ferramenta MySQL Workbench.
- Crie uma base de dados com o nome "db_aluno".
- Defina o usuário a e senha de acesso.

Como executar o projeto:
- Na ferramenta PhpStorm, abra um terminal e acesse a pasta "backend".
- Acessar o arquivo ".env" e alterar os seguintes campos de acordo com os novos dados: database, username e password.
  - ![image](https://github.com/user-attachments/assets/2821788f-e020-4280-bf97-e9c4d2c53a23)

- Pelo terminal, executar os comandos:
  - "composer install" para instalar as dependências dos pacotes de bibliotecas.
  - "php spark migrate" para criação das tabelas.
  - "php spark serve" para executar a API.



Frontend

IDE utilizada: VS Code

Pré-requisitos:
- Node - 20.17.0 ou superior.

Como executar o projeto:
- Na ferramenta VS Code, abra um terminal e acesse a pasta "frontendreact". Execute os comandos:
  - npm install
  - npm run dev
- A aplicação frontend será executada no browser de sua preferência.
