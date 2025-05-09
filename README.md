Pra executar:

1. 'composer install';
2. 'php artisan migrate';
3. 'php artisan serve'.

OBS: 
- O arquivo para a coleção do postman também está na pasta junto com o projeto
- Pra criar um funcionário, primeiro cria um departamento
- Dependendo de qual o id do funcionario ou departamento que será criado, o id da url também deverá ser trocado.

Pra visualizar as duas tabelas foi usando o seguinte código sql no workbench:

USE `app-empresa-rh`;

select * from employees;
select * from departaments;

------------------------------------------------

Passos do desenvolvimento da atividade:

1. criando 'api.php';
2. criando as rotas da api;
3. criando as models Employee e Departament;
4. criando as migrations de cada;
5. alterando as informações do .env para o db;
6. fazendo as migrações: "php artisan migrate";
7. alterando a migração de employees;
8. Testando todas as rotas.