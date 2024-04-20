Desafio

Tecnologias Usadas:

Laravel
Mysql
Docker
API

Para utilizar entrar na pasta da APP

cd app/

rodar os comandos abaixo
cp .env.example .env

docker-compose up -d

Front criado nas blades

command de envio dos relatorios diariamente 
api\app\Console\Commands\EnviarRelatorioVendas.php

Documentacao da api

docker configurado para porta 8080 

ex: localhost:8080/api/listar/

POST
/api/vendedores/
Body Example:
{
 "nome": "Marcos",
 "email": "Gimenez@gmail.com",
}


Listar todos os vendedores
POST
caminho: /api/listar/


Listar todas as vendas de um vendedor
GET
caminho: /api/listarVendedor/{id}/vendas


Vendas
Lançar uma nova venda
POST
caminho: /api/vendas/
Body Example:
{
 "vendedor_id": 1,
 "valor": 4500
}