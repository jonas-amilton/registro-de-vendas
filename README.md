<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 - Registro de Vendas</h1>
    <br>
</p>

Sistema simples onde é possível criar registros de vendas de produtos.
Para cadastrar uma venda, é necessário informar o cliente (opcional) e os itens da venda. Além disso, é preciso ter a opção para selecionar uma forma de pagamento e a possibilidade de gerar parcelas para a venda. Cada parcela deve ter a data de vencimento e o valor.
Também é importante mostrar uma listagem de vendas realizadas e as funções de editar ou excluir uma venda.

## DIRECTORY STRUCTURE

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      migrations/:        contém as migrations
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

## REQUIREMENTS

PHP >= 7.4 - foi utiliza a versão 8.2

mySQL >= 5.7 - foi utilizado a versão 8

## INSTALLATION

### Comandos

Clone o repositório

```
git clone https://github.com/jonas-amilton/registro-de-vendas.git
```

Acesse o projeto

```
cd registro-de-vendas

```

Rode o projeto

```
php yii serve
```

Acesse no localhost

```
http://localhost:8080/
```

## CONFIGURAÇÃO DO BANCO DE DADOS

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=sales_record',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
```

Criar a tabela `sales_record`

```
CREATE DATABASE `sales_record`
```

Rodar as migrations

```
php yii migrate
```
