# Projeto crud-alunos

Backend

Pré-requisitos:
- Composer 2.7.9
- PHP versão 8.3.12 ou superior.

Extensões necessárias:
- intl
- mbstring
- json (enabled by default - don't turn it off)
- mysqlnd (para utilizar o MySQL)
- libcurl (para utilizar o HTTP\CURLRequest library)

Como executar o projeto:
- Acessar a pasta "backend".
- Acessar o arquivo ".env" e alterar os seguintes campos de acordo com os novos dados: database, username e password.
![image](https://github.com/user-attachments/assets/2821788f-e020-4280-bf97-e9c4d2c53a23)

- Pelo terminal, executar os comandos:
  - "composer install" para instalar as dependências dos pacotes de bibliotecas.
  - "php spark migrate" para criação das tabelas.
  - "php spark serve" para executar a API.


Frontend

Pré-requisitos:
- Node - 20.17.0 ou superior.

Como executar o projeto:
- Acessar a pasta "frontend" pelo terminal executar:
  - npm install
  - npm run dev
  - A aplicação frontend será executada no browser de sua preferência.
