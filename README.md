# 🌱 Planta's Burguer

Sistema simples de gerenciamento de pedidos para uma lancheria vegetariana.

## 📌 Sobre o projeto

O **Planta's Burguer** é uma aplicação web desenvolvida em PHP com MySQL que permite realizar operações básicas de CRUD (Create, Read, Update, Delete) em um sistema de pedidos.

O sistema gerencia:

* Clientes
* Itens do cardápio
* Pedidos
* Itens de cada pedido

## ⚙️ Tecnologias utilizadas

* PHP
* MySQL
* HTML + CSS

## 🧩 Funcionalidades

* Cadastro de clientes
* Cadastro de itens
* Criação de pedidos com múltiplos itens
* Cálculo automático do total do pedido
* Listagem de pedidos com:

  * Cliente
  * Itens
  * Quantidade
  * Subtotal por item
  * Total geral

## 🗃️ Estrutura do projeto

```
backend/
  source/
    infra/
      database.php
    modules/
      costumer.php
      item.php
      order.php
    .secret
    .secret.example

database/
  modeling.plantuml
  schema.sql

frontend/
  html/
  css/
  images/
  modules/
    customer/
      customer-create-form.php
      customer-table-form.php
      customer-update-form.php
    demand/
      demand-create-form.php
      demand-create-form.php
      demand-table-form.php
    item/
      item-table-form.php
      item-update-form.php
      item-update-form.php

.gitignore
README.md
```

## 🛠️ Como rodar o projeto

1. Inicie o servidor
2. Crie o banco de dados:

   ```sql
   CREATE DATABASE plantas_burguer;
   ```
3. Execute o arquivo `schema.sql`
4. Configure a conexão no arquivo `.secret`
5. Acesse pelo navegador:

   ```
   http://localhost/
   ```
